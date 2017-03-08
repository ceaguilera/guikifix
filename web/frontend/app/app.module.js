(function() {
  'use strict';
  angular
    .module('guikifixApp', 
    [
        'ui.router', 
        'guikifixApp.home', 
        'guikifixApp.about', 
        'guikifixApp.login',
        'guikifixApp.register',
        'guikifixApp.category',
        'guikifixApp.requestFilters'
    ]);
})();

angular.module('guikifixApp')
      .config(["$locationProvider", function($locationProvider) {
      $locationProvider.html5Mode({
          enabled: true,
          requireBase: false
      });
}]);
        