angular.module('guikifixApp.updateData')
.controller('updateData', function($scope, $log, $http, $window, auth, $state) {
    $scope.locations = JSON.parse($window.localStorage.getItem('LOCATIONS'));
    $scope.formRegisterUser = JSON.parse($window.localStorage.getItem('formRegisterUser'));
    console.log($scope.locations);

    $scope.locationsChange = (id) => {
        let url = "/api/location/"+id;
        console.log(url);
        $http.get(url)
            .then(function mySucces(response) {
                    $scope.municipalities = response.data;
            }, function myError(response) {
                console.log(response);
        });
    };
    $scope.municipalyChange = (id) => {
        let url = "/api/location/"+id;
        console.log(url);
        $http.get(url)
            .then(function mySucces(response) {
                $scope.cities = response.data;
            }, function myError(response) {
                console.log(response);
        });
    };

     $scope.sendData = () => {
        $scope.formRegisterUser.birthdate = new Date($scope.day + '-' + $scope.month + '-' + $scope.year);
        $scope.formRegisterUser.gender = parseInt($scope.formRegisterUser.gender);
        console.log($scope.formRegisterUser);
        $http({
            method: "POST",
            url: "/api/userprofile/set/info",
            data: $scope.formRegisterUser
        })
        .then(function mySucces(response) {
            console.log(response);
            //auth.loginRegister($scope.formRegisterUser.first_name, 
            //$scope.formRegisterUser.last_name);
            $window.localStorage.removeItem('formRegisterUser');
           if($window.localStorage.getItem('dataJob') === null) {
                $window.location = "/";
                //tengo que mandar a la vista de recepcion de datos
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
        }, function myError(response) {
            console.log(response.statusText);
        });
    }
});