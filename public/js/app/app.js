(function () {

    // toastr notifier https://github.com/CodeSeven/toastr
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    angular.module('config', []).config(['$interpolateProvider', function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }]);

})();


var buildFormErrors = function($scopeError, data) {
    try {
        for (var property in data) {
            if (data.hasOwnProperty(property)) {
                $scopeError[property] = data[property];
            }
        }
    } catch (e) {
        console.log(e);
    }
    return $scopeError;
}