<div class='row'>
    <div class='col-md-3'></div>
    <div class='col-md-6'>
 
        <h1>Member Request</h1>
        <br/>
        <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
        <form role='form' name='registerForm'> 
            <div class='form-group'>
                <ng-form name='registerFormIn'>
                    <label for='username'>User Name:</label>
                    <input  type='textbox' 
                            class='form-control' 
                            name='username' 
                            ng-model='user.username' 
                            id='username' 
                            placeholder='User Name' 
                            ng-required='true' />
                    <div ng-show="registerFormIn.username.$dirty && registerFormIn.username.$invalid">
                        <span class="error" ng-show="registerFormIn.username.$error.required">The field is required.</span>
                    </div>
                    <br />
                    <label for='displayname'>Real Name:</label>
                    <input  type='textbox' 
                            class='form-control' 
                            name='displayname' 
                            ng-model='user.displayName' 
                            id='displayname' 
                            placeholder='Real Name' 
                            ng-required='true' />
                    <div ng-show="registerFormIn.displayname.$dirty && registerFormIn.displayname.$invalid">
                        <span class="error" ng-show="registerFormIn.displayname.$error.required">The field is required.</span>
                    </div>
                    <br />
                    <label for='email'>Email Address:</label>
                    <input  type='email' 
                            class='form-control' 
                            name='email' 
                            ng-model='user.email' 
                            id='email' 
                            placeholder='Email Address' 
                            ng-required='true' />
                    <div ng-show="registerFormIn.email.$dirty && registerFormIn.email.$invalid">
                        <span class="error" ng-show="registerFormIn.email.$error.required">The field is required.</span>
                        <span class="error" ng-show="registerFormIn.email.$error.email">This is not a valid email address</span>
                    </div>
                    <br />
                    <label for='email2'>Confirm Email Address:</label>
                    <input  type='email' 
                            class='form-control' 
                            name='email2' 
                            ng-model='user.email2' 
                            id='email2' 
                            placeholder='Confirm Email Address' 
                            ng-required='true'
                            ng-match='user.email' />
                    <div ng-show="registerFormIn.email2.$dirty && registerFormIn.email2.$invalid">
                        <span class="error" ng-show="registerFormIn.email2.$error.required">The field is required.</span>
                        <span class="error" data-ng-show="registerFormIn.email2.$error.match">Emails do not match.</span>
                    </div>
                    <br />
                    <label for='password'>Password:</label>
                    <input  type='password' 
                            class='form-control' 
                            name='password' 
                            ng-model='user.password' 
                            id='password' 
                            placeholder='Password' 
                            ng-required='true' />
                    <div ng-show="registerFormIn.password.$dirty && registerFormIn.password.$invalid">
                        <span class="error" ng-show="registerFormIn.password.$error.required">The field is required.</span>
                    </div>
                    <br />
                    <label for='password2'>Confirm Password:</label>
                    <input  type='password' 
                            class='form-control' 
                            name='password2' 
                            ng-model='user.password2'
                            id='password2' 
                            placeholder='Confirm Password' 
                            ng-required='true'
                            ng-match='user.password' />
                    <div ng-show="registerFormIn.password2.$dirty && registerFormIn.password2.$invalid">
                        <span class="error" ng-show="registerFormIn.password2.$error.required">The field is required.</span>
                        <span class="error" data-ng-show="registerFormIn.password2.$error.match">Passwords do not match.</span>
                    </div>
                    <br />
                    <div class='btn-group'>
                        <button class='btn btn-primary' ng-disabled="{{isSaving}}" ng-click='submit(user)'>Request Membership</button>
                    </div>
                </ng-form>
            </div>
        </form>
    </div>
    <div class='col-md-3'></div>
</div>
