(function() {
    'use strict';

    angular.module('guikifixApp.jobReceived')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('jobReceived', {
            url: '/TrabajoRecibido',
            templateUrl: '../frontend/app/search/jobReceived/jobReceived.html',
            controller: 'jobReceived',
            controllerAs: 'vm'
        });
    }
})();