angular.module('guikifixApp.myjobs')
.controller('myjobs', function($scope, $rootScope, $log, $http, $window, auth) {
   
   
   $http.get("/api/job/get/list")
    .then(function mySucces(response) {        
        $rootScope.myjobs = response.data;
    }, function myError(response) {
        alert('Error al cargar los datos');
    });

    
});