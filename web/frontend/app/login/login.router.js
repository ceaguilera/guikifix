(function() {
    'use strict';

    angular.module('guikifixApp.login')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('login', {
            url: '/login',
            templateUrl: './frontend/app/login/login.html',
            controller: 'login',
            controllerAs: 'vm'
        });
    }
})();