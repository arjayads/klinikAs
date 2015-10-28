var dashboard = angular.module('dashboard', ['config', 'ngTouch', 'angucomplete-alt']);

dashboard.controller('queueCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.queue = [
        {'firstName': 'John', 'lastName': 'Doe', 'date': 'July 17, 2015 2:45 PM'}
    ]

    $scope.remoteUrlRequestFn = function(str) {
        return {q: str, limit: 10};
    };
}]);
