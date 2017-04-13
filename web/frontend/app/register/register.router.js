(function() {
    'use strict';

    angular.module('guikifixApp.register')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('register', {
            url: '/registro',
            templateUrl: './frontend/app/register/register.html',
            controller: 'register',
            controllerAs: 'vm'
        });
    }
})();