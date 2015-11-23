var managePatientApp = angular.module('managePatient', ['config', 'ngTouch', 'ui.grid', 'ui.grid.pagination', 'dirFormError']);

managePatientApp.controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {


    var q = ""; // query string
    $scope.query = "";

    $scope.buildCellUrl = function(id) {
        return '/patient/' + id + '/detail';
    }

    var paginationOptions = {
        pageNumber: 1,
        pageSize: 15,
        sort: 'asc',
        sortCol: 'lastName'
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
                field: 'lastName',
                enableSorting: true,
                enableHiding: false,
                cellTemplate: '<a href="{{grid.appScope.buildCellUrl(row.entity.id)}}" class="ui-grid-cell-contents">{{row.entity.lastName}}</a>'
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
        var query = [];

        var searchUrl ='patient/find';
        var countSearchUrl ='patient/countFind';
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

managePatientApp.controller('detailCtrl', ['$scope', '$http', function ($scope, $http) {
}]);

managePatientApp.controller('editCtrl', ['$scope', '$http', function ($scope, $http) {

    $scope.title = 'Create New Patient Record';
    $scope.patient = {};
    $scope.patientId = undefined;
    $scope.url = '/patient/create';

    $scope.$watch('patientId', function(newValue, oldValue) {
        if ((patientId = newValue) !== undefined) {
            $scope.url = '/patient/update';
            $scope.caption = "Update patient";
            $scope.title = 'Edit Patient Record';

            $http.get('/patient/' + patientId).success(function(data) {
                $scope.patient = data;
                $scope.patient.birthDate = $.datepicker.formatDate('mm/dd/yy', new Date(data.birthDate));
                setDatePickerVal($scope.patient.birthDate);
            }).error(function() {
                toastr.error('Something went wrong!');
            });
        } else {
            $scope.caption = "Add patient";
        }
    });


    $scope.processPatientInfo = function() {
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
                $scope.errors = buildFormErrors($scope.errors, data);
            }
            toastr.error('Something went wrong!');
            $scope.submitting = false;
            $scope.caption = prevCap;
        });
    }
}]);