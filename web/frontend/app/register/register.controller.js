angular.module('guikifixApp.register')
.controller('register', function($scope, $log, $http) {
    $scope.sendData = () => {
        console.log($scope.formRegisterUser);
        $http({
            method: "POST",
            url: "api/user/register",
            data: $scope.formRegisterUser
        })
        .then(function mySucces(response) {
            console.log(response);
        }, function myError(response) {
            console.log(response.statusText);
        });
    }
});