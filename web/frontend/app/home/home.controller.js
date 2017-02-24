angular.module('guikifixApp.home')
.controller('home', function($scope, $log) {
    $scope.saludo = "holaaaaa";
    $scope.specialtiesList = [
        {
            id: 123,
            name: 'PLOMERIA'
        },
        {
            id: 124,
            name: 'CARPINTERIA'
        },
        {
            id: 125,
            name: 'ALBAÑILERIA'
        }
    ]
    console.log($scope.specialtiesList);
});