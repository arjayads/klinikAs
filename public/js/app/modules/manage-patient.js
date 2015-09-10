var managePatientApp = angular.module('managePatient', ['ngTouch', 'ui.grid', 'ui.grid.pagination']);

managePatientApp.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}]);

managePatientApp.controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {

    $scope.buildCellUrl = function(id) {
        return '/patient/' + id + '/detail';
    }

    $scope.gridOptions1 = {
        paginationPageSizes: [15, 30, 45],
        paginationPageSize: 15,
        columnDefs: [
            {
                field: 'lastName',
                enableSorting: true,
                enableHiding: false,
                cellTemplate: '<a target="_blank" href="{{grid.appScope.buildCellUrl(row.entity.id)}}" class="ui-grid-cell-contents">{{row.entity.lastName}}</a>'
            },
            { field: 'firstName', enableSorting: true, enableHiding: false },
            { field: 'middleName', enableSorting: true, enableHiding: false },
            { field: 'birthDate', enableSorting: true, enableHiding: false },
            //{ field: 'Age', enableSorting: true, enableHiding: false },
            { field: 'sex', enableSorting: true, enableHiding: false },
            { field: 'updatedAt', enableSorting: true, enableHiding: false }
        ],
        onRegisterApi: function( gridApi ) {
            $scope.grid1Api = gridApi;
        }
    };

    $http.get('patient/all').success(function(data) {
        $scope.gridOptions1.data = data;
    }).error(function() {
        toastr.error('Something went wrong!');
    });

}]);
