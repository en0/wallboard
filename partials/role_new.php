<div class="modal-header">
    <h3 class="modal-title">Create New Role</h3>
</div>
<div class="modal-body">
    <div class='row'>
        <div class='col-md-3'>
            <label for="role">Identity</label>
        </div>
        <div class='col-md-6'>
            <input  type='text' 
                    id="role" 
                    name="role" 
                    ng-model="item.role"
                    placeholder="Role Identity"
                    class='form-control'>
            </input>
        </div>
    </div>
    <br/>
    <div class='row'>
        <div class='col-md-3'>
            <label for="label">Role Label</label>
        </div>
        <div class='col-md-6'>
            <input  type='text' 
                    id="label" 
                    name="label" 
                    ng-model="item.label" 
                    placeholder="Role Label" 
                    class='form-control'>
            </input>
        </div>
    </div>
    <br/>
    <div class='row'>
        <div class='col-md-3'>
            <label for='desc'>Description</label>
        </div>
        <div class='col-md-6'>
            <input  type='text' 
                    id="desc" 
                    name="desc" 
                    ng-model="item.desc" 
                    placeholder="Role Description" 
                    class='form-control'>
            </input>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="btn-group">
        <button class="btn btn-primary" ng-click="ok()">OK</button>
        <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
    </div>
</div>

