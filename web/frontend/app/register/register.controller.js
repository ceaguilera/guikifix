angular.module('guikifixApp.register')
.controller('register', function($scope, $log, $http, $window, auth, $state) {
    $scope.sendData = () => {
        console.log($scope.formRegisterUser);
        $http({
            method: "POST",
            url: "api/user/register",
            data: $scope.formRegisterUser
        })
        .then(function mySucces(response) {
            console.log(response);
            //auth.loginRegister($scope.formRegisterUser.first_name, 
            //$scope.formRegisterUser.last_name);
            $window.localStorage.setItem('formRegisterUser', JSON.stringify($scope.formRegisterUser));
            $state.go("updateData");

           /* if($window.localStorage.getItem('dataJob') === null) {
                $window.location = "/";
            } else {
                let structure = $window.localStorage.getItem('dataJob');
                let url = "/api/job/set";
                $http({
                method : "POST",
                url : url,
                data : structure
                }).then(function mySucces(response) {
                    console.log(response.data);
                    $window.localStorage.removeItem("dataJob");
                    //$window.location = "/jobReceived";
                    $state.go("jobReceived");
                }, function myError(response) {
                    console.log(response.data);
                });
            }
            */
        }, function myError(response) {
            console.log(response.statusText);
        });
    }
});