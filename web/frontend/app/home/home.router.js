(function() {
    'use strict';

    angular.module('guikifixApp.home')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('home', {
            url: '/home',
            templateUrl: './frontend/app/home/home.html',
            controller: 'home',
            controllerAs: 'vm'
        });
    }
})();