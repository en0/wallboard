<h1>User Management</h1><br/>
<tabset>
    <tab heading='Users'>
        <div class='row'>
            <div class='col-md-4'><h3>Users</h3></div>
            <div class='col-md-5'><alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert></div>
            <div class='col-md-3'>
                <div class="form-group has-feedback ">
                    <input type="search" class="form-control" placeholder="Search Users" ng-model='user_filter' />
                    <i class="glyphicon glyphicon-search form-control-feedback"></i>
                </div>
            </div>
        </div><br/>
        <table class='table table-hover table-condensed'>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Status</th>
                <th></th>
            </tr>
            <tr ng-repeat='req in pending | filter:user_filter' ng-class="req.verified ? 'warning' : 'danger'"}>
                <td>{{req.displayName}}</td>
                <td>{{req.email}}</td>
                <td ng-if="req.verified == false">Pending Verification</td>
                <td ng-if="req.verified == true">Pending Approval</td>
                <td><span ng-click='showPendingDetails(req.id)' class='glyphicon glyphicon-edit cursor-pointer'></span>&nbsp;
                <span ng-click='removePending(req.id)' class='glyphicon glyphicon-remove cursor-pointer'></span></td>
            </tr>
            <tr ng-repeat='user in users | filter:user_filter' ng-class='{active:user.active}'>
                <td>{{user.displayName}}</td>
                <td>{{user.email}}</td>
                <td ng-if="user.active == true">Active</td>
                <td ng-if="user.active == false">Inactive</td>
                <td><span ng-click='showUserDetails(user.id)' class='glyphicon glyphicon-edit cursor-pointer'></span>&nbsp;
                <span ng-click='removeUser(user.id)' class='glyphicon glyphicon-remove cursor-pointer'></span></td>
            </tr>
        </table>
    </tab>
    <tab heading='Roles'>
        <div class='row'>
            <div class='col-md-4'><h3>Roles</h3></div>
            <div class='col-md-5'><alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert></div>
            <div class='col-md-3'>
                <div class="form-group has-feedback ">
                    <input type="search" class="form-control" placeholder="Search Roles" ng-model='roles_filter' />
                    <i class="glyphicon glyphicon-search form-control-feedback"></i>
                </div>
            </div>
        </div><br/>
        <table class='table table-hover table-condensed'>
            <tr>
                <th>Identifier</th>
                <th>Label</th>
                <th>Description</th>
                <th></th>
            </tr>
            <tr ng-repeat='req in roles | filter:roles_filter'>
                <td>{{req.role}}</td>
                <td>{{req.label}}</td>
                <td>{{req.desc}}</td>
                <td><span ng-click='showRoleDetails(req.id)' class='glyphicon glyphicon-edit cursor-pointer'></span>&nbsp;
                <span ng-if='!req.builtin' ng-click='removeRole(req.id)' class='glyphicon glyphicon-remove cursor-pointer'></span></td>
            </tr>
        </table>
    </tab>
</tabset>

