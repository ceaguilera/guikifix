(function() {
    'use strict';

    angular.module('guikifixApp.panel')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('panel', {
            url: '/user/panel',
            templateUrl: './frontend/app/user/panel/panel.html',
            controller: 'panel',
            controllerAs: 'vm'
        });
    }
})();