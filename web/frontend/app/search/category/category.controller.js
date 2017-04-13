angular.module('guikifixApp.category')
.controller('category', function($scope, $log, $http, $stateParams,$rootScope, $location, $window, $state) {
    
    $scope.selected = parseInt($stateParams.categoryId);
    const init = (selected) => {
        let url = "/api/jobtype/"+selected;
        let updateURL = "/category/"+selected;
        $location.path(updateURL);
        $http.get(url)
        .then(function mySucces(response) {
            $scope.categories = response.data;
            $scope.arraySelection = new Array($scope.categories.length);
            console.log($scope.arraySelection);
            console.log($scope.categories);
        }, function myError(response) {
            console.log(response.statusText);
        });        
    }
    init($scope.selected);

    /* Inicializa el primer select cuando cambia */
    $scope.categoryChange = (selected) => {
        init(selected);
    }

    /* Inicializa la posicion del array principal que es un check */
    $scope.initArray = (key) => {
        $scope.arraySelection[key] = new Array($scope.categories[key].children.length);
    }

    /* Cambia el estado del check en el array de check en el array pricipal */
    $scope.changeCheck = (key, keySub, id, check) => {
        $scope.arraySelection[key][keySub] = check ? id : null;
    }

    $scope.structureStart = () => {
        let structure = {};
        structure.type_element = $scope.arraySelection;
        structure.job_description = $scope.workDescription;
        console.log(structure);
        $window.localStorage.setItem('dataJob', JSON.stringify(structure));
        console.log(JSON.parse($window.localStorage.getItem('dataJob')));
        $state.go("requestFilters");

    }

});