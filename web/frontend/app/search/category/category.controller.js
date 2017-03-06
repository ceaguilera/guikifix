angular.module('guikifixApp.category')
.controller('category', function($scope, $log, $http, $stateParams,$rootScope, $location) {
    
    $scope.selected = parseInt($stateParams.categoryId);
    
    const init = (selected) => {
        let url = "/api/jobtype/"+selected;
        let updateURL = "/category/"+selected;
        $location.path(updateURL);
        $http({
            method : "POST",
            url : url
        }).then(function mySucces(response) {
            $scope.categories = response.data;
            console.log($scope.categories);
        }, function myError(response) {
            console.log(response.statusText);
        });        
    }
    init($scope.selected);

    $scope.categoryChange = (selected) => {
        init(selected);
    }

});