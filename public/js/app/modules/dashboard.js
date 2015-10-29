var dashboard = angular.module('dashboard', ['config', 'ngTouch', 'angucomplete-alt']);

dashboard.controller('queueCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.queue = [];

    $scope.remoteUrlRequestFn = function(str) {
        return {q: str, limit: 10};
    };

    $scope.selectedPatient = function(selected) {
        if (selected) {
            $scope.$broadcast('angucomplete-alt:clearInput');
            queuePatient(selected.originalObject);
        }
    };

    var queuePatient = function(patient) {
        $http.post('/patient/queue/' + patient.id).success(function(data) {
            if (!data.error) {
                toastr.success(data.message);
                $scope.queue.push({'firstName': patient.firstName, 'lastName': patient.lastName, 'date': new Date()});
            } else {
                toastr.error('Something went wrong!');
            }
        }).error(function(data, a) {
            toastr.error('Something went wrong!');
        });
    }
}]);
