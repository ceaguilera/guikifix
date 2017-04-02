angular.module('guikifixApp.login')
.controller('login', function($scope, $log, $http, auth) {
    //la función login que llamamos en la vista llama a la función
    //login de la factoria auth pasando lo que contiene el campo
    //de texto del formulario
    $scope.login = () =>  {
        auth.login($scope.email, $scope.password);
    }
});