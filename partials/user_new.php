<div class="modal-header">
    <h3 class="modal-title">Create New User</h3>
</div>
<div class="modal-body">
    <div class='row'>
        <div class='col-md-3'>
            <label for="displayName">Member Name</label>
        </div>
        <div class='col-md-6'>
            <input  type='text' 
                    id="displayName" 
                    name="displayName" 
                    ng-model="item.user.displayName" 
                    placeholder="Member Name" 
                    class='form-control'>
            </input>
        </div>
    </div>
    <br/>
    <div class='row'>
        <div class='col-md-3'>
            <label for="item.user.ame">User Name</label>
        </div>
        <div class='col-md-6'>
            <input  type='text' 
                    id="username" 
                    name="username" 
                    ng-model="item.user.username" 
                    placeholder="User Name" 
                    class='form-control'>
            </input>
        </div>
    </div>
    <br/>
    <div class='row'>
        <div class='col-md-3'>
            <label>Email Address</label>
        </div>
        <div class='col-md-6'>
            <input  type='text' 
                    id="email" 
                    name="email" 
                    ng-model="item.user.email" 
                    placeholder="Email Address" 
                    class='form-control'>
            </input>
        </div>
    </div>
    <br/>
    <div class='row'>
        <div class='col-md-3'>
            <label>Status</label>
        </div>
        <div class='col-md-6'>
            <select name='active' 
                    ng-model='item.user.active' 
                    id='active' 
                    placeholder='Status'
                    class='form-control'>
                <option value='true' selected>Active</option>
                <option value='false'>Inactive</option>
            </select>
        </div>
    </div>
    <br/>
    <div class='row'>
        <div class='col-md-3'>
            <label>Storage Limit (MB)</label>
        </div>
        <div class='col-md-6'>
            <input  type='number' 
                    name='storageLimit' 
                    id='storageLimit' 
                    ng-model='item.user.storageLimit' 
                    placeholder='Storage Limit'
                    class='form-control'>
            </input>
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

