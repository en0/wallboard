"use strict"

var BASE_URI = '/rest';
function uri(res, args) { 
    var uri = BASE_URI + res; 
    if (typeof(args) !== 'undefined') {
        angular.forEach(args, function(param) { uri += '/' + param; });
    }
    return uri;
}

app.factory('$auth', ['$http', '$window', '$q', function($http, $win, $q) {

    function getAuthority() {
        try {
            return JSON.parse(atob($win.sessionStorage['authority']));
        } catch(err) {
            return null
        }
    }

    function setAuthority(result) {
        var authority = {
            'ident' : result.ident,
            'token' : result.token,
            'checksum' : result.checksum,
            'isAuthenticated' : result.isAuthenticated,
        };

        $win.sessionStorage['authority'] = btoa(JSON.stringify(authority));
        return authority;
    }

    function isInRole(role) {
        console.log("Is In Role: " + role);
        var authority = getAuthority();
        var _ret = false;
        if(authority == null)
            return false;

        angular.forEach(authority.ident.roles, function(_role) {
            if(role == _role) _ret = true;
        });

        return _ret;
    }

    function logout() {
        $win.sessionStorage.removeItem('authority');
    }

    function login(username, password) {
        var deferred = $q.defer();

        $http.post(uri('/authority'), {
            username: username,
            password: password,
        })
        
        .success(function(result) {
            var authority = setAuthority(result);
            deferred.resolve(authority);
        })

        .error(function(error) {
            deferred.reject(error);
        });

        return deferred.promise;
    };

    function syncAuthority() {
        var deferred = $q.defer();
        var authority = getAuthority()
        if(authority == null) { deferred.reject("No Authority"); } 
        else {
            $http.get(uri('/authority',[authority.token,authority.checksum]))
            .success(function(result) {
                var authority = setAuthority(result);
                deferred.resolve(authority);
            })
            .error(function(error) {
                setAuthority({isAuthenticated: false});
                deferred.reject(error);
            });
        }
        return deferred.promise;
    }

    return {
        login: login,
        logout: logout,
        isInRole: isInRole,
        syncAuthority: syncAuthority,
        get isAuthenticated() {
            var authority = getAuthority();
            if(authority != null)
                return authority.isAuthenticated;
            return false;
        },
        get displayName() {
            var authority = getAuthority();
            if(authority != null && typeof(authority.ident) !== 'undefined')
                return authority.ident.displayName;
            return "";
        },
        get token() {
            var authority = getAuthority();
            if(authority != null)
                return authority.token;
            return 0;
        },
    };

}]);

app.factory('$registration', ['$http', '$auth', '$q', function($http, $auth, $q) {

    /** TEMP STUFF TO FAKE IT **/
    var __db = [
        {
            id: 0,
            displayName: 'John Doe',
            username: 'John_Doe',
            email: 'john_doe@mail.com',
            verified: true,
            authorized: false,
            requestDate: 'jan 1, 1900',
            notes: 'You dont know this person',
        },
        {
            id: 1,
            displayName: 'Sally Smith',
            username: 'Sally_Smith',
            email: 'sally_smith@mail.com',
            verified: false,
            authorized: false,
            requestDate: 'jan 1, 1900',
            notes: null,
        }
    ]

    var db = {
        getDetail : function(id) { return __db[id]; },
        get list() {
            var _ret = []
            angular.forEach(__db, function(item) {
                _ret.push({
                    id: item.id,
                    displayName: item.displayName,
                    email: item.email,
                    verified: item.verified,
                });
            });
            return _ret;
        },
        add : function(user) {
            __db.push({
                id: __db.length,
                username: user.username,
                displayName: user.username,
                email: user.email,
                verified: false,
                authorized: false,
                requestDate: 'today',
                notes: null,
            });
        },
        del : function(id) { __db.splice(id, 1); return {msg: "OK" }; },
        save : function(user) {
            var id = user.id;
            __db[id].authorized = user.authorized == 'true' || user.authorized == true;
            __db[id].notes = user.notes;
            return __db[id];
        },
    };
    /** TEMP STUFF TO FAKE IT **/

    function put(user) {
        // Public
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.add(user));
        }, 1000);

        return deferred.promise;
    }

    function getList() {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.list);
        }, 1000);

        return deferred.promise;
    }

    function getDetail(id) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.getDetail(id));
        }, 1000);

        return deferred.promise;
    }

    function remove(id) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.del(id));
        }, 1000);

        return deferred.promise;
    }

    function save(user) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.save(user));
        }, 1000);

        return deferred.promise;
    }

    return {
        put : put,
        getList : getList,
        getDetail : getDetail,
        remove : remove,
        save : save,
    };

}]);

app.factory('$users', ['$http', '$auth', '$q', function($http, $auth, $q) {

    /** Temp stuff for testing **/
    var __db = [
        {
            id: 0,
            username: 'ian',
            displayName: 'Ian Laird',
            roles: ["user","admin"],
            active: true,
            email: 'irlaird@gmail.com',
            createDate : 'jan 1, 1900',
            lastSeenDate : 'jan 1, 1900',
            storageSize: 988,
            storageLimit: 1024
        },
        {
            id: 1,
            username: 'deswen',
            displayName: 'Desiree Laird',
            roles: ["user","admin"],
            active: true,
            email: 'desiree.laird@gmail.com',
            createDate : 'jan 1, 1900',
            lastSeenDate : 'jan 1, 1900',
            storageSize: 988,
            storageLimit: 1024
        },
        {
            id: 2,
            username: 'mrlaird',
            displayName: 'Mart Laird',
            roles: ["user"],
            active: false,
            email: 'mrlaird@cableone.net',
            createDate : 'jan 1, 1900',
            lastSeenDate : 'jan 1, 1900',
            storageSize: 12,
            storageLimit: 1024
        }
    ];

    var db = {
        getDetail : function(id) { return __db[id]; },
        get list() {
            var _ret = []
            angular.forEach(__db, function(item) {
                _ret.push({
                    id: item.id,
                    displayName: item.displayName,
                    active: item.active,
                    email: item.email,
                });
            });
            return _ret;
        },
        add : function(user) {
            console.log(user);
            __db.push({
                id: __db.length,
                username: user.username,
                displayName: user.displayName,
                active: user.active == 'true' || user.active == true,
                email: user.email,
                createDate : 'jan 1, 1900',
                lastSeenDate : 'jan 1, 1900',
                storageSize: 0,
                storageLimit: parseInt(user.storageLimit),
                roles: user.roles,
            });
        },
        del : function(id) { __db.splice(id, 1); return {msg: "OK" }; },
        save : function(user) {
            var id = user.id;
            __db[id].username = user.username;
            __db[id].displayName = user.displayName;
            __db[id].active = user.active == 'true' || user.active == true;
            __db[id].email = user.email;
            __db[id].storageSize = user.storageSize;
            __db[id].roles = user.roles;
            return __db[id];
        },
    };
    /** Temp stuff for testing **/

    function put(user) {
        // private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.add(user));
        }, 1000);

        return deferred.promise;
    }

    function getList() {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.list);
        }, 1000);

        return deferred.promise;
    }

    function getDetail(id) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.getDetail(id));
        }, 1000);

        return deferred.promise;
    }

    function remove(id) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.del(id));
        }, 1000);

        return deferred.promise;
    }

    function save(user) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.save(user));
        }, 1000);

        return deferred.promise;
    }

    return {
        put : put,
        getList : getList,
        getDetail : getDetail,
        remove : remove,
        save : save,
    };
    
}]);

app.factory('$roles', ['$http', '$q', function($http, $q) {

    /** Temp stuff for testing **/
    var __db = [
        {
            id: 0,
            role: 'admin',
            label: 'Administrator',
            desc: 'A user with super user access.',
            builtin: true,
        },
        {
            id: 1,
            role: 'user',
            label: 'User',
            desc: 'A user with basic access.',
            builtin: true,
        },
        {
            id: 2,
            role: 'devel',
            label: 'Developer',
            desc: 'A user with special access.',
            builtin: false,
        }
    ];

    var db = {
        getDetail : function(id) { return __db[id]; },
        get list() {
            var _ret = []
            angular.forEach(__db, function(item) {
                _ret.push({
                    id: item.id,
                    role: item.role,
                    label: item.label,
                    desc: item.desc,
                    builtin: item.builtin,
                });
            });
            return _ret;
        },
        add : function(role) {
            __db.push({
                id: __db.length,
                role: role.role,
                label: role.label,
                desc: role.desc,
                builtin: false,
            });
        },
        del : function(id) { __db.splice(id, 1); return {msg: "OK" }; },
        save : function(role) {
            var id = role.id;
            __db[id].label = role.label;
            __db[id].desc = role.desc;
            return __db[id];
        },
    };
    /** Temp stuff for testing **/

    function put(role) {
        // private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.add(role));
        }, 1000);

        return deferred.promise;
    }

    function getList() {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.list);
        }, 1000);

        return deferred.promise;
    }

    function getDetail(id) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.getDetail(id));
        }, 1000);

        return deferred.promise;
    }

    function remove(id) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.del(id));
        }, 1000);

        return deferred.promise;
    }

    function save(role) {
        // Private
        var deferred = $q.defer();

        setTimeout(function() {
            //deferred.reject({msg: 'Because i said so'});
            deferred.resolve(db.save(role));
        }, 1000);

        return deferred.promise;
    }

    return {
        put : put,
        getList : getList,
        getDetail : getDetail,
        remove : remove,
        save : save,
    };
    
}]);

