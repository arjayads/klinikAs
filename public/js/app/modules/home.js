var homeApp = angular.module('home', []);

homeApp.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}]);

homeApp.controller('mainCtrl', ['$scope', function ($scope) {
    $scope.message = 'Welcome';
}]);
