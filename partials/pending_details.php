<div class="modal-header">
    <h3 class="modal-title">Membership Request Details</h3>
</div>
<div class="modal-body">
    <div class='row'>
        <div class='col-md-3'>
            <label>Requestor</label>
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
            <div>{{item.user.email}}&nbsp;<span ng-show="!item.user.verified" class='glyphicon glyphicon-warning-sign'></span></div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label>Requested On</label>
        </div>
        <div class='col-md-6'>
            <div>{{item.user.requestDate}}</div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label>Authorized</label>
        </div>
        <div class='col-md-6'>
            <select name='authorized' ng-model='item.user.authorized' id='authorized'>
                <option value='true'>Authorized</option>
                <option value='false'>Pending</option>
            </select>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3'>
            <label>Notes</label>
        </div>
        <div class='col-md-6'>
            <textarea class='form-control' ng-model='item.user.notes'></textarea>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="btn-group">
        <button class="btn btn-primary" ng-click="ok()">OK</button>
        <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
    </div>
</div>

