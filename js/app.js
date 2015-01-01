var app = angular.module('myApp', ['ngRoute','ui.bootstrap','nvd3ChartDirectives']);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider

        /** Public Routes **/
        .when("/", { templateUrl: "partials/home.html", controller: "homeCtrl", isPublic: true })
        .when("/about", { templateUrl: "partials/about.html", controller: "aboutCtrl", isPublic: true })
        .when("/404", { templateUrl: "partials/404.html", isPublic: true })

        /** Private Routes **/
        .when("/settings", { templateUrl: "partials/settings.html", controller: "settingsCtrl" })

        .otherwise({ redirectTo: '/404' });
}]);

