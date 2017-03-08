(function() {
    'use strict';

    angular.module('guikifixApp.requestFilters')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('requestFilters', {
            url: '/filtro',
            templateUrl: '../frontend/app/search/requestFilters/requestFilters.html',
            controller: 'requestFilters',
            controllerAs: 'vm'
        });
    }
})();