(function() {
  'use strict';
  angular
    .module('guikifixApp', 
    [
        'ui.router',
        'ngCookies',
        'ngRangeFilter',
        'guikifixApp.home', 
        'guikifixApp.about', 
        'guikifixApp.login',
        'guikifixApp.myjobs',
        'guikifixApp.myjob',
        'guikifixApp.panel',
        'guikifixApp.register',
        'guikifixApp.category',
        'guikifixApp.requestFilters',
        'guikifixApp.jobReceived',
        'guikifixApp.updateData'
    ]);
})();

angular.module('guikifixApp')
      .config(["$locationProvider", function($locationProvider) {
      $locationProvider.html5Mode({
          enabled: true,
          requireBase: false
      });
}]);


angular.module('guikifixApp')
      .run(function($window, $rootScope, $cookies, $http, locations) {
        var hours = 24; // Reset when storage is more than 24hours
        var now = new Date().getTime();
        var setupTime = localStorage.getItem('setupTime');
        if (setupTime == null) {1
            localStorage.setItem('setupTime', now)
        } else {
            if(now-setupTime > hours*60*60*1000) {
                localStorage.clear()
                localStorage.setItem('setupTime', now);
            }
        }
        let authShow = $window.localStorage.getItem("authShow");
        let nameUser =  $cookies.get('name');
        $rootScope.authShow = authShow  ? authShow : false;
        $rootScope.nameUser = (nameUser != 'undefined' && authShow) ? nameUser : null;
        /* Se llama a piden las localidades para ser usadas en todo el sistema */
        locations.getMainLocations();
});


//factoria que controla la autentificación, devuelve un objeto
//$cookies para crear cookies
//$cookieStore para actualizar o eliminar
//$location para cargar otras rutas
angular.module('guikifixApp').factory("auth", function($window,$rootScope ,$cookies,$cookieStore,$location, $http)
{
    return{
        login : function(email, password)
        {
            let data = {
                userName: email,
                pass : password
            }
            $http({
                method : "POST",
                url : "/api/user/login",
                data : data,
            }).then(function mySucces(response) {
                console.log(response);
                $window.localStorage.setItem("authShow", true);
                //creamos la cookie con el nombre que nos han pasado
                $cookies.put('name', response.data.first_name + ' ' + response.data.last_name);
                //mandamos a la home
                $window.location = "/";
            }, function myError(response) {
                console.log("error",response);
                $rootScope.errorLogin = true;
            })
        },
        loginRegister : function(first_name, last_name) {
            $window.localStorage.setItem("authShow", true);
            //creamos la cookie con el nombre que nos han pasado
            $cookies.put('name', first_name + ' ' + last_name);
        },
        logout : function()
        {
            //al hacer logout eliminamos la cookie con $cookieStore.remove
            $http({
                method : "GET",
                url : "/logout",
            }).then(function mySucces(response) {
                $cookieStore.remove("name");
                $window.localStorage.setItem("authShow", true);
                $window.localStorage.removeItem("authShow");
                $window.location = "/";
            }, function myError(response) {
                console.log(response);
                $cookies.errorLogin = true;
            })
            //$cookieStore.remove("password");
            //mandamos al login
            //$location.path("/login");
        },
        saveUser : function (userName, password, saveUser){
             $cookies.put('userName', userName);
             $cookies.put('password', password);
             $cookies.put('saveUser', saveUser);
        },
        deleteUser: function () {
            $cookieStore.remove('userName');
            $cookieStore.remove('password');
            $cookieStore.remove('saveUser');
        },
        checkStatus : function()
        {
            //creamos un array con las rutas que queremos controlar
            var rutasPrivadas = ["/home","/dashboard","/login"];
            if(this.in_array($location.path(),rutasPrivadas) && typeof($cookies.username) == "undefined")
            {
                $location.path("/login");
            }
            //en el caso de que intente acceder al login y ya haya iniciado sesión lo mandamos a la home
            if(this.in_array("/login",rutasPrivadas) && typeof($cookies.username) != "undefined")
            {
                $location.path("/home");
            }
        },
        in_array : function(needle, haystack)
        {
            var key = '';
            for(key in haystack)
            {
                if(haystack[key] == needle)
                {
                    return true;
                }
            }
            return false;
        }
    }
});

angular.module('guikifixApp').service("locations", function ($http, $window) {

        this.getMainLocations = () => {
            let url = "/api/location/1";
            console.log(url);
            $http.get(url)
                .then(function mySucces(response) {
                   $window.localStorage.setItem('LOCATIONS', JSON.stringify(response.data));
                }, function myError(response) {
                   console.log(response);
            });
        }
        this.getLocations = (id) => {
            let url = "/api/location/"+id;
            console.log(url);
            $http.get(url)
                .then(function mySucces(response) {
                }, function myError(response) {
                   console.log(response);
            });
        }
});

angular.module('guikifixApp')
.controller('logoutController', function($scope, $log, $http, auth) {
    //la función login que llamamos en la vista llama a la función
    //login de la factoria auth pasando lo que contiene el campo
    //de texto del formulario
    $scope.logout = () =>  {
        auth.logout();
    }
});

angular.module('guikifixApp').filter('cut', function () {
        return function (value, wordwise, max, tail) {
            if (!value) return '';

            max = parseInt(max, 10);
            if (!max) return value;
            if (value.length <= max) return value;

            value = value.substr(0, max);
            if (wordwise) {
                var lastspace = value.lastIndexOf(' ');
                if (lastspace !== -1) {
                  //Also remove . and , so its gives a cleaner result.
                  if (value.charAt(lastspace-1) === '.' || value.charAt(lastspace-1) === ',') {
                    lastspace = lastspace - 1;
                  }
                  value = value.substr(0, lastspace);
                }
            }

            return value + (tail || ' …');
        };
    });
        