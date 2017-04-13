angular.module('guikifixApp.requestFilters')
.controller('requestFilters', function($scope, $rootScope, $log, $http, $window, locations, $state) {
    $http.get("/api/jobStatus/")
        .then(function mySucces(response) {
            console.log(response.data);
            $scope.data = response.data;
            $scope.arraySelection = new Array(response.data.length);
            $scope.initArray();
            console.log($scope.arraySelection);
        }, function myError(response) {
            console.log(response.statusText);
        });
    
    
    $scope.locations = JSON.parse($window.localStorage.getItem('LOCATIONS'))
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
    }

     /* Cambia el estado del check en el array de check en el array pricipal */
    $scope.changeCheck = (key, keySub, id, check) => {
        $scope.arraySelection[key][keySub] = check ? id : null;
    }

    $scope.initArray = () => {
        $scope.arraySelection[4] = new Array($scope.data[4].children.length);
    }

    $scope.sendData = () => {
        console.log($scope.arraySelection);
        console.log($scope.municipaliSelect);
        let structure = JSON.parse($window.localStorage.getItem('dataJob'));
        structure.job_status = $scope.arraySelection;
        structure.location = $scope.municipaliSelect;
        console.log(structure);
        $window.localStorage.setItem('dataJob', JSON.stringify(structure));
        if($window.localStorage.getItem('authShow') === null) {
            $state.go("register");
        } else {
            let url = "/api/job/set";
            $http({
            method : "POST",
            url : url,
            data : structure
            }).then(function mySucces(response) {
                console.log(response.data);
                $window.localStorage.removeItem("dataJob");
                $state.go("jobReceived");
            }, function myError(response) {
                console.log(response.data);
            });
        }
    }


});