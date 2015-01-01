"use strict"

app.factory('$gitlab', ['$http', '$window', '$q', function($http, $win, $q) {

    function projects() {
        var deferred = $q.defer();

        $http.get(uri('/api/v3/projects'))

        .success(function(result) {
            deferred.resolve(result);
        })

        .error(function(error) {
            deferred.reject(error);
        });

        return deferred.promise;
    };

    return {
        projects: projects
    };
}]);

