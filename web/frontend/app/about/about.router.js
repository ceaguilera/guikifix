(function() {
    'use strict';

    angular.module('guikifixApp.about')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('about', {
            url: '/about',
            templateUrl: './frontend/app/about/about.html',
            controller: 'about',
            controllerAs: 'vm'
        });
    }
})();