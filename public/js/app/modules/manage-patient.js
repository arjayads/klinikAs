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
        pageSize: 15,
        sort: 'asc',
        sortCol: 'lastName'
    };

    $scope.dateToMills = function(input) {
        return new Date(input).getTime();
    }

    $scope.gridOptions1 = {
        paginationPageSizes: [15, 30, 45],
        paginationPageSize: 15,
        useExternalPagination: true,
        columnDefs: [
            {
                field: 'lastName',
                enableSorting: true,
                enableHiding: false,
                cellTemplate: '<a target="_blank" href="{{grid.appScope.buildCellUrl(row.entity.id)}}" class="ui-grid-cell-contents">{{row.entity.lastName}}</a>'
            },
            { field: 'firstName', enableSorting: true, enableHiding: false },
            { field: 'middleName', enableSorting: true, enableHiding: false },
            { field: 'birthDate', displayName: 'Date of Birth', cellFilter: 'date:\'mediumDate\'', enableSorting: true, enableHiding: false },
            { field: 'sex', enableSorting: true, enableHiding: false },
            {
                field: 'updatedAt',  displayName: 'Last updated', enableSorting: true, enableHiding: false,
                cellTemplate: "<span>{{grid.appScope.dateToMills(row.entity.updatedAt) | date: 'medium'}}</span>"
            }
        ],
        onRegisterApi: function(gridApi) {
            $scope.gridApi = gridApi;
            $scope.gridApi.core.on.sortChanged($scope, function(grid, sortColumns) {
                if (sortColumns.length == 0) {
                    paginationOptions.sort = 'asc';
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

        var query = [];
        query.push('sortCol=' + paginationOptions.sortCol);
        query.push('direction=' + paginationOptions.sort);

        var limit = paginationOptions.pageSize * paginationOptions.pageNumber;
        query.push('limit=' + limit);
        query.push('offset=' + (limit - paginationOptions.pageSize));

        var params = "";
        for(var x = 0; x < query.length; x++) {
            params += query[x] + "&";
        }
        url += "?" + params;

        $http.get(url).success(function(data) {
            try {
                $scope.gridOptions1.totalItems = data.count;
                $scope.gridOptions1.data = data.rows;
            }catch (e) {}
        }).error(function() {
            toastr.error('Something went wrong!');
        });

    };

    getPage();

}]);
