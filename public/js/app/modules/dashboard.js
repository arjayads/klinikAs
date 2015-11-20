var dashboard = angular.module('dashboard', ['config', 'ngTouch', 'angucomplete-alt']);

dashboard.controller('queueCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.queue = [];

    $http.get('/patient/onQueue').success(function(data) {
        $scope.queue = data;
    }).error(function(data, a) {
        toastr.error('Failed to load queued patients!');
    });

    $scope.dateToMills = function(input) {
        return new Date(input).getTime();
    }

    $scope.remoteUrlRequestFn = function(str) {
        return {q: str, limit: 10};
    };

    $scope.selectedPatient = function(selected) {
        if (selected) {
            $scope.$broadcast('angucomplete-alt:clearInput');
            queuePatient(selected.originalObject);
        }
    };

    $scope.removeFromQ = function(qId, index) {
        $http.post('/patient/queue/'+qId+'/remove').success(function(data) {
            if (parseInt(data) > 0) {
                $scope.queue.splice(index, 1);
            }
        }).error(function(data, a) {
            toastr.error('Something went wrong!');
        });
    }

    $scope.cancelResetQ = function() {
        $('#confirmModal').modal('hide');
    }

    $scope.okResetQ = function() {
        $http.post('/patient/resetQueue').success(function(data) {
            if (parseInt(data) > 0) {
                toastr.success('Queue successfully reset');
                $scope.queue = [];
                $('#confirmModal').modal('hide');
            }
        }).error(function(data, a) {
            toastr.error('Something went wrong!');
        });
    }

    $scope.resetQ = function() {
        $('#confirmModal').modal('show');
    }

    var queuePatient = function(patient) {
        $http.post('/patient/queue/' + patient.id).success(function(data) {
            if (!data.error) {
                toastr.success(data.message);
                $scope.queue.push({'id': patient.id, 'firstName': patient.firstName, 'lastName': patient.lastName, 'date': new Date()});
            } else {
                toastr.error('Something went wrong!');
            }
        }).error(function(data, a) {
            toastr.error('Something went wrong!');
        });
    }
}]);
