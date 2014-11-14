<div class='row'>
    <div class='col-md-3'></div>
    <div class='col-md-6'>
 
        <h1>Member Login</h1><br/>
        <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
        <form role='form' name='signForm'> 
            <div class='form-group'>
                <ng-form name=signFormIn>
                    <label for='username'>User Name:</label>
                    <input  type='textbox' 
                            class='form-control' 
                            name='username' 
                            ng-model='user.username' 
                            id='username' 
                            placeholder='User Name' 
                            ng-required='true' />
                    <div ng-show="signFormIn.username.$dirty && signFormIn.username.$invalid">
                        <span class="error" ng-show="signFormIn.username.$error.required">The field is required.</span>
                    </div>
                    <br />
                    <label for='password'>Password:</label>
                    <input  type='password' 
                            class='form-control' 
                            name='password' 
                            ng-model='user.password' 
                            id='password' 
                            placeholder='Password' 
                            ng-required='true'/>
                    <div ng-show="signFormIn.password.$dirty && signFormIn.password.$invalid">
                        <span class="error" ng-show="signFormIn.password.$error.required">The field is required.</span>
                    </div>
                    <br />
                    <div class='btn-group'>
                        <button class='btn btn-primary' ng-click='submit(user)'>Login</button>
                        <button class='btn btn-default' ng-click='changeView("register")'>Register</button>
                    </div>
                </ng-form>
            </div>
        </form>
    </div>
    <div class='col-md-3'></div>
</div>
