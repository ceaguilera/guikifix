angular.module('guikifixApp.login')
.controller('login', function($scope, $rootScope, $log, $http, auth, $cookies) {
    //la función login que llamamos en la vista llama a la función
    //login de la factoria auth pasando lo que contiene el campo
    //de texto del formulario
    $rootScope.errorLogin = false;
    if ($cookies.get('saveUser')) {
        $scope.email = $cookies.get('userName');
        $scope.password = $cookies.get('password');
        $scope.saveUser = true;
    }
        
    $scope.login = () =>  {
        auth.login($scope.email, $scope.password);
    }

    $scope.saveOrDelete = () => {
        console.log("cambio");
        if($scope.saveUser)
            auth.saveUser($scope.email, $scope.password,$scope.saveUser);
        else
            auth.deleteUser();
    };
});