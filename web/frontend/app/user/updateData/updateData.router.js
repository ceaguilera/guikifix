(function() {
    'use strict';

    angular.module('guikifixApp.updateData')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('updateData', {
            url: '/actualizar',
            templateUrl: './frontend/app/user/updateData/updateData.html',
            controller: 'updateData',
            controllerAs: 'vm'
        });
    }
})();