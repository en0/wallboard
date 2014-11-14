<div class="modal-header">
    <h3 class="modal-title">Role Details</h3>
</div>
<div class="modal-body">
    <div class='row'>
        <div class='col-md-3'>
            <label>Identity</label>
        </div>
        <div class='col-md-6'><span>{{item.role}}</span></div>
    </div>
    <br/>
    <div class='row'>
        <div class='col-md-3'>
            <label>Is Builtin</label>
        </div>
        <div class='col-md-6'><span>{{item.builtin}}</span></div>
    </div>
    <br/>
    <div class='row'>
        <div class='col-md-3'>
            <label for="label">Role Label</label>
        </div>
        <div class='col-md-6'>
            <span ng-if='item.builtin' id='label'>{{item.label}}</span>
            <input  type='text' 
                    id="label" 
                    name="label" 
                    ng-if='!item.builtin'
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
            <span ng-if='item.builtin' id='label'>{{item.desc}}</span>
            <input  type='text' 
                    id="desc" 
                    name="desc" 
                    ng-if='!item.builtin'
                    ng-model="item.desc" 
                    placeholder="Role Description" 
                    class='form-control'>
            </input>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="btn-group">
        <button ng-if='!item.builtin' class="btn btn-primary" ng-click="ok()">OK</button>
        <button ng-if='!item.builtin' class="btn btn-warning" ng-click="cancel()">Cancel</button>
        <button ng-if='item.builtin' class="btn btn-primary" ng-click="cancel()">OK</button>
    </div>
</div>

