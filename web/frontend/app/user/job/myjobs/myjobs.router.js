(function() {
    'use strict';

    angular.module('guikifixApp.myjobs')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('myjobs', {
            url: '/usuario/trabajos',
            templateUrl: '../frontend/app/user/job/myjobs/myjobs.html',
            controller: 'myjobs',
            controllerAs: 'vm'
        });
    }
})();