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
        sortCol: 'name'
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
                field: 'Name',
                enableSorting: true,
                enableHiding: false,
                cellTemplate: '<a href="{{grid.appScope.buildCellUrl(row.entity.id)}}" class="ui-grid-cell-contents">{{row.entity.name}}</a>'
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
                    paginationOptions.sortCol = 'name';
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

    $scope.patient = {};
    $scope.patientId = undefined;
    $scope.url = '/patient/create';

    $scope.$watch('patientId', function(newValue, oldValue) {
        if ((patientId = newValue) !== undefined) {
            $scope.url = '/patient/update';
            $scope.caption = "Update patient";

            $http.get('/patient/' + patientId).success(function(data) {
                $scope.patient = data;
                $scope.patient.birthDate = $.datepicker.formatDate('mm/dd/yy', new Date(data.birthDate));
            }).error(function() {
                toastr.error('Something went wrong!');
            });
        } else {
            $scope.caption = "Add patient";
        }
    });


    $scope.processForm = function() {
        var prevCap =  $scope.caption;
        if ($scope.submitting) return; // prevent multiple submission
        $scope.caption ='Saving...';
        $scope.submitting = true;
        $scope.errors = {};

        $scope.patient.birthDate =  $('#dob').val();

        $http.post($scope.url, $scope.patient).success(function(data) {
            if (!data.error) {
                toastr.success('Patient successfully saved');
                $scope.caption ='Saved';
                setTimeout(function(){
                    window.location = '/patient/' + data.entityId + '/detail';
                }, 2000);
            } else {
                $scope.submitting = false;
                $scope.caption = prevCap;
            }
        }).error(function(data, a) {
            if (a == '422') {
                try {
                    for (var property in data) {
                        if (data.hasOwnProperty(property)) {
                            $scope.errors[property] = data[property];
                        }
                    }
                } catch (e) {
                    console.log(e);
                }
            }
            toastr.error('Something went wrong!');
            $scope.submitting = false;
            $scope.caption = prevCap;
        });
    }
}]);