(function() {
  'use strict';
  angular
    .module('guikifixApp', 
    [
        'ui.router',
        'ngCookies',
        'guikifixApp.home', 
        'guikifixApp.about', 
        'guikifixApp.login',
        'guikifixApp.register',
        'guikifixApp.category',
        'guikifixApp.requestFilters',
        'guikifixApp.jobReceived'
    ]);
})();

angular.module('guikifixApp')
      .config(["$locationProvider", function($locationProvider) {
      $locationProvider.html5Mode({
          enabled: true,
          requireBase: false
      });
}]);

//factoria que controla la autentificación, devuelve un objeto
//$cookies para crear cookies
//$cookieStore para actualizar o eliminar
//$location para cargar otras rutas
angular.module('guikifixApp').factory("auth", function($cookies,$cookieStore,$location, $http)
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
            }, function myError(response) {
                console.log(response);
            })
            //console.log(email, password);
            //var error = "error en el email";
            //return error;
            //creamos la cookie con el nombre que nos han pasado
            //$cookies.username = username,
            //$cookies.password = password;
            //mandamos a la home
            //$location.path("/home");
        },
        logout : function()
        {
            //al hacer logout eliminamos la cookie con $cookieStore.remove
            $cookieStore.remove("username"),
            $cookieStore.remove("password");
            //mandamos al login
            $location.path("/login");
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
        