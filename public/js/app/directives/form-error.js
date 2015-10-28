(function () {
    var app;
    var app = angular.module('dirFormError', []);

    app.directive('formError', [function () {
        return {
            scope : {
                errField : '='
            },
            restrict: 'E',
            template:
                '<span style="color: red !important;" ng-show="errField"> \
                    <ul class="error" style="list-style-type: none; margin-bottom: 0;"> \
                        <li ng-repeat="err in errField track by $index">{{ err }}</li> \
                    </ul> \
                </span>'
        };
    }]);
}).call(this);