angular.module('guikifixApp.home')
.controller('home', function($scope, $log, $http, $window, $location) {
    $http({
        method : "POST",
        url : "/api/jobtype/"
    }).then(function mySucces(response) {
        console.log(response.data);
        $scope.specialtiesList = response.data;
    }, function myError(response) {
        console.log(response.statusText);
    });

    $scope.redictCategory = (select) => {
        $location.path('/category').search({categoryId: select})
    }
});