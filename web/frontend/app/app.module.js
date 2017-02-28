(function() {
  'use strict';
  angular
    .module('guikifixApp', ['ui.router', 'guikifixApp.home', 'guikifixApp.about', 'guikifixApp.login']);
})();

angular.module('guikifixApp')
      .config(["$locationProvider", function($locationProvider) {
      $locationProvider.html5Mode({
          enabled: true,
          requireBase: false
      });
}]);
        