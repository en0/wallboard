<html>
    <head>
        
        <!-- AngularJS -->
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>	
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-route.min.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
        <script src="/js/ui-bootstrap-tpls-0.11.2.min.js"></script>

        <!-- Application Specific -->
        <link rel="stylesheet" href="/css/site.css">
        <script src="/js/app.js"></script>
        <script src="/js/controllers.js"></script>
        <script src="/js/directives.js"></script>
        <script src="/js/filters.js"></script>
        <script src="/js/services.js"></script>

    </head>

    <body ng-app="myApp" ng-controller='rootCtrl'>
        <div id='menu'>
            <div class='container'>
            <ul class='list-inline'>
                <li class='pull-right'><span class='menu-disabled'>0xBADC0DE</span></li>
                <li ng-show="menu==null"><span class='menu-disabled'>Loading...</span></li>
                <li class='dropdown' on-toggle='toggle(open)' ng-repeat="top_menu in menu">

                    <!-- If the menu item has a url target -->
                    <a href='{{top_menu.target}}' ng-if='top_menu.type == "url"'>{{top_menu.label}}</a>

                    <!-- If the menu item has a function target -->
                    <a href ng-click='top_menu.target()' ng-if='top_menu.type == "fn"'>{{top_menu.label}}</a>

                    <!-- If the menu item is a menu divider -->
                    <span ng-if="top_menu.type == 'divider'" class='menu-disabled'>|</span>

                    <!-- If the menu item is a menu list -->
                    <a href class='dropdown-toggle' ng-if='top_menu.type == "list"'>{{top_menu.label}}</a>
                    <span class="caret" ng-if='top_menu.type == "list"'></span>
                    <ul class='dropdown-menu' ng-if='top_menu.type == "list"'>
                        <li ng-repeat="sub_menu in top_menu.items" ng-class='{divider:sub_menu.type=="divider"}' style='color:initial'>
                            <a ng-if="sub_menu.type == 'url' && sub_menu.enabled == true" href='{{sub_menu.target}}'>{{sub_menu.label}}</a>
                            <a ng-if="sub_menu.type == 'fn' && sub_menu.enabled == true" href ng-click='sub_menu.target()'>{{sub_menu.label}}</a>
                            <a ng-if="sub_menu.enabled == false" href class='menu-disabled'>{{sub_menu.label}}</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
        <br/><br/>
        <div class='container'>
            <div ng-view></div>
        </div>
    </body>

</html>
