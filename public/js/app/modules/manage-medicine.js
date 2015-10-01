var manageMedicineApp = angular.module('manageMedicine', ['config', 'ngTouch', 'ui.grid', 'ui.grid.pagination', 'dirFormError']);

manageMedicineApp.controller('mainCtrl', ['$scope', '$http', 'uiGridConstants', function ($scope, $http, uiGridConstants) {


    var q = ""; // query string
    $scope.query = "";

    $scope.buildCellUrl = function(id) {
        return '/medicine/' + id + '/detail';
    }

    var paginationOptions = {
        pageNumber: 1,
        pageSize: 15,
        sort: 'asc',
        sortCol: 'genericName'
    };

    $scope.$watch('query', function(searchText, oldValue) {
        if (searchText !== undefined && $.trim(searchText).length >= 3) {
            q = 'q='+ encodeURIComponent(searchText);
            getPage();
        } else
        if (searchText === undefined || $.trim(searchText).length == 0) {
            q = '';
            getPage();
        }
    });

    $scope.dateToMills = function(input) {
        return new Date(input).getTime();
    }

    $scope.gridOptions1 = {
        paginationPageSizes: [15, 30, 45],
        paginationPageSize: 15,
        useExternalPagination: true,
        columnDefs: [
            {
                field: 'genericName',
                enableSorting: true,
                enableHiding: false,
                cellTemplate: '<a href="{{grid.appScope.buildCellUrl(row.entity.id)}}" class="ui-grid-cell-contents">{{row.entity.genericName}}</a>'
            },
            {
                field: 'commercialName',  enableSorting: true, enableHiding: false
            },
            {
                field: 'brand',  enableSorting: true, enableHiding: false
            },
            {
                field: 'unitMeasure',  displayName: 'Unit', enableSorting: true, enableHiding: false
            },
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
                    paginationOptions.sortCol = 'genericName';
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
        var query = [];

        var searchUrl ='medicine/find';
        var countSearchUrl ='medicine/countFind';
        query.push('sortCol=' + paginationOptions.sortCol);
        query.push('direction=' + paginationOptions.sort);
        query.push('sortCol=' + paginationOptions.sortCol);
        query.push('direction=' + paginationOptions.sort);
        query.push('offset=' + ((paginationOptions.pageSize * paginationOptions.pageNumber) - paginationOptions.pageSize));
        query.push('limit=' + paginationOptions.pageSize);
        query.push(q);

        var params = "";
        for(var x = 0; x < query.length; x++) {
            params += query[x] + "&";
        }
        searchUrl += "?" + params;
        countSearchUrl += "?" + params;

        $http.get(countSearchUrl).success(function(data) {
            $scope.gridOptions1.totalItems = data;
        });

        $http.get(searchUrl).success(function(data) {
            $scope.gridOptions1.data = data;
        }).error(function() {
            toastr.error('Something went wrong!');
        });
    };
}]);

manageMedicineApp.controller('detailCtrl', ['$scope', '$http', function ($scope, $http) {
}]);

manageMedicineApp.controller('editCtrl', ['$scope', '$http', function ($scope, $http) {

    $scope.title = "Add medicine";
    $scope.patient = {};
    $scope.medicineId = undefined;
    $scope.url = '/medicine/create';

    $scope.$watch('medicineId', function(newValue, oldValue) {
        if ((medicineId = newValue) !== undefined) {
            $scope.url = '/medicine/update';
            $scope.caption = "Update medicine";
            $scope.title = "Update medicine";

            $http.get('/medicine/' + medicineId).success(function(data) {
                $scope.medicine = data;
            }).error(function() {
                toastr.error('Something went wrong!');
            });
        } else {
            $scope.caption = "Add medicine";
        }
    });


    $scope.processForm = function() {
        var prevCap =  $scope.caption;
        if ($scope.submitting) return; // prevent multiple submission
        $scope.caption ='Saving...';
        $scope.submitting = true;
        $scope.errors = {};


        $http.post($scope.url, $scope.medicine).success(function(data) {
            if (!data.error) {
                toastr.success('Medicine successfully saved');
                $scope.caption ='Saved';
                setTimeout(function(){
                    //window.location = '/patient/' + data.entityId + '/detail';
                    window.location = '/medicine';
                }, 2000);
            } else {
                $scope.submitting = false;
                $scope.caption = prevCap;
            }
        }).error(function(data, a) {
            if (a == '422') {
                $scope.errors = buildFormErrors($scope.errors, data);
            }
            toastr.error('Something went wrong!');
            $scope.submitting = false;
            $scope.caption = prevCap;
        });
    }
}]);