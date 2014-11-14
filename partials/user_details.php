<div class="modal-header">
    <h3 class="modal-title">User Details</h3>
</div>
<div class="modal-body">
    <div class='row'>
        <div class='col-md-3'>
            <label>Member Name</label>
        </div>
        <div class='col-md-6'>
            <div>{{item.user.displayName}} ({{item.user.username}})</div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label>Email Address</label>
        </div>
        <div class='col-md-6'>
            <div>{{item.user.email}}</div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label>Created On</label>
        </div>
        <div class='col-md-6'>
            <div>{{item.user.createDate}}</div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label>Last Seen On</label>
        </div>
        <div class='col-md-6'>
            <div>{{item.user.lastSeenDate}}</div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label for='active'>Status</label>
        </div>
        <div class='col-md-6'>
            <select name='active' ng-model='item.user.active' id='active'>
                <option value='true'>Active</option>
                <option value='false'>Inactive</option>
            </select>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label>Storage Limit</label>
        </div>
        <div class='col-md-6'>
            <input type='number' name='storageLimit' id='storageLimit' ng-model='item.user.storageLimit'></input>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label>Used Storage</label>
        </div>
        <div class='col-md-6'>
            <div>{{(item.user.storageSize / item.user.storageLimit) * 100|number:1}}% ({{item.user.storageSize}} / {{item.user.storageLimit}} MB)</div>
        </div>
    </div>
    <br />
    <div class='row'>
        <div class='col-md-3'>
            <label>Roles</label>
        </div>
        <div class='col-md-6'>
            <ul class='list-unstyled'>
                <li ng-repeat='role in item.roles'>
                    <input  class='col-md-1' 
                            value='{{role.role}}' 
                            ng-checked="item.user.roles.indexOf(role.role) > -1" 
                            ng-click="item.user.roles.indexOf(role.role) > -1 ? item.user.roles.splice(item.user.roles.indexOf(role.role), 1) : item.user.roles.push(role.role);"
                            type='checkbox' />&nbsp;
                    <span class='col-md-3'>{{role.label}}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="btn-group">
        <button class="btn btn-primary" ng-click="ok()">OK</button>
        <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
    </div>
</div>

