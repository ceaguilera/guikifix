(function() {
    'use strict';

    angular.module('guikifixApp.category')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];

    function myApp($stateProvider) {
        $stateProvider.state('category', {
            url: '/category',
            templateUrl: './frontend/app/search/category/category.html',
            controller: 'category',
            controllerAs: 'vm'
        });
    }
})();