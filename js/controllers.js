'use strict'
app.controller('rootCtrl', ['$rootScope', '$location', '$route', function($rootScope, $loc, $route) {
}]);

app.controller('homeCtrl', ['$scope', function($scope) {
    $scope.id = "nvd3-pie-chart-"+1; 

    $scope.burndownData = [
        { key: 'Planned', values: [ [ 0 , 100] , [ 100, 0] ], area: true },
        { key: 'Actual', values: [ [ 0 , 100] , [10,89], [20,74], [30,70], [40, 65], [50, 64], [60,63] ] },
        { key: 'Projected', values: [ [ 0 , 100] , [ 120, 0] ]},
    ];
 
    $scope.issueData = [
        { key: 'Tasks', values: [ ['Ian',30], ['Chad',22], ['Sasa',31] ] }, 
        { key: 'RFCs', values: [ ['Ian',15], ['Chad',2], ['Sasa',5] ] }, 
        { key: 'Bugs', values: [ ['Ian',2], ['Chad',6], ['Sasa',8] ] }, 
        { key: 'HotFixes', values: [ ['Ian',6], ['Chad',1], ['Sasa',0] ] }, 
    ];

    $scope._colors = [
        '#5CB85C', '#428BCA', '#F0AD4E', '#D9534F'
    ];
 
    $scope.colorFn = function() {
        return function(d, i) {
            console.log(d);
            return $scope._colors[i];
        };
    };

    console.log('test');
}]);

app.controller('aboutCtrl', ['$scope', function($scope) {
}]);

