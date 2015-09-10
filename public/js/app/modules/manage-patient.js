var managePatientApp = angular.module('managePatient', ['ngTouch', 'ui.grid', 'ui.grid.pagination']);

managePatientApp.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}]);

managePatientApp.controller('mainCtrl', ['$scope', '$http', 'uiGridConstants', function ($scope, $http, uiGridConstants) {

    $scope.buildCellUrl = function(id) {
        return '/patient/' + id + '/detail';
    }

    var paginationOptions = {
        pageNumber: 1,
        pageSize: 25,
        sort: null,
        sortCol: 'lastName'
    };

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
        onRegisterApi: function(gridApi) {
            $scope.gridApi = gridApi;
            $scope.gridApi.core.on.sortChanged($scope, function(grid, sortColumns) {
                if (sortColumns.length == 0) {
                    paginationOptions.sort = null;
                    paginationOptions.sortCol = 'lastName';
                } else {
                    paginationOptions.sort = sortColumns[0].sort.direction;
                    paginationOptions.sortCol = sortColumns[0].field;
                }
                getPage();
            });
            gridApi.pagination.on.paginationChanged($scope, function (newPage, pageSize) {
                paginationOptions.pageNumber = newPage;
                paginationOptions.pageSize = pageSize;
                getPage();
            });
        }
    };

    var getPage = function() {
        var url ='patient/all';
        
        if (paginationOptions.sortCol != null) {
            url += '/' + paginationOptions.sortCol;

            if (paginationOptions.sort != null) {
                url += '/' + paginationOptions.sort;
            }
        }

        $http.get(url).success(function(data) {
            $scope.gridOptions1.totalItems = 100;
            var firstRow = (paginationOptions.pageNumber - 1) * paginationOptions.pageSize;
            $scope.gridOptions1.data = data.slice(firstRow, firstRow + paginationOptions.pageSize);
        }).error(function() {
            toastr.error('Something went wrong!');
        });

    };

    getPage();

}]);
