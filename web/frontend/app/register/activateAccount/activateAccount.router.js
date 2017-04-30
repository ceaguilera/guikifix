(function() {
    'use strict';

    angular.module('guikifixApp.activateAccount')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('activateAccount', {
            url: '/activar',
            templateUrl: './frontend/app/register/activateAccount/activateAccount.html',
            controller: 'activateAccount',
            controllerAs: 'vm'
        });
    }
})();