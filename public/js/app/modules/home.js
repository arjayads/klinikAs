var homeApp = angular.module('home', ['config']);

homeApp.controller('mainCtrl', ['$scope', function ($scope) {
    $scope.message = 'Welcome';
}]);
