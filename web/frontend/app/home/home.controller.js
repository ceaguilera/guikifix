angular.module('guikifixApp.home')
.controller('home', function($scope, $log, $http, $window, $location, $state, $rootScope) {
    $http.get("/api/jobtype/")
    .then(function mySucces(response) {
        console.log(response.data);
        $rootScope.specialtiesList = response.data;
    }, function myError(response) {
        console.log(response.statusText);
    });

    $scope.redictCategory = (select) => {
        $state.go("category", {
            categoryId: select
         });
       // $location.path('/category').search({"categoryId": select})
    }
});