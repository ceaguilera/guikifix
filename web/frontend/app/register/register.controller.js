angular.module('guikifixApp.register')
.controller('register', function($scope, $log, $http, $window, auth) {
    $scope.sendData = () => {
        console.log($scope.formRegisterUser);
        $http({
            method: "POST",
            url: "api/user/register",
            data: $scope.formRegisterUser
        })
        .then(function mySucces(response) {
            console.log(response);
            auth.loginRegister($scope.formRegisterUser.first_name, 
            $scope.formRegisterUser.last_name);
            $window.location = "/";

        }, function myError(response) {
            console.log(response.statusText);
        });
    }
});