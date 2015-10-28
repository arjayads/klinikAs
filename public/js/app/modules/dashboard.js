var dashboard = angular.module('dashboard', ['config', 'ngTouch', 'angucomplete-alt']);

dashboard.controller('queueCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.queue = [];

    $scope.remoteUrlRequestFn = function(str) {
        return {q: str, limit: 10};
    };

    $scope.selectedPatient = function(selected) {
        if (selected) {
            $scope.queue.push({'firstName': selected.originalObject.firstName, 'lastName': selected.originalObject.lastName, 'date': new Date()});
            $scope.$broadcast('angucomplete-alt:clearInput');
        }
    };

}]);
