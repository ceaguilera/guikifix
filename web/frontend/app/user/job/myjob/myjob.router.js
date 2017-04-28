(function() {
    'use strict';

    angular.module('guikifixApp.myjob')
        .config(myApp);

    myApp.$inject = ['$stateProvider'];
    
    function myApp($stateProvider) {
        $stateProvider.state('myjob', {
            url: '/usuario/trabajo',
            views: {
              '' : {
                templateUrl: '../frontend/app/user/job/myjob/myjob.html',
                controller: 'myjob'
              } ,
              'resumen@myjob': {      
                    templateUrl: '../frontend/app/user/job/myjob/partials/resumen.html',
                    controller: 'myjob'
                }
            }
        }).
        state('edit',{
            url: '/usuario/trabajo/editar',
            views: {
              '' : {
                templateUrl: '../frontend/app/user/job/myjob/myjob.html',
                controller: 'myjob'
              } ,
              'edit@edit': {      
                    templateUrl: '../frontend/app/user/job/myjob/partials/edit.html',
                    controller: 'myjob'
               }
            }
        }).
        state('job',{
            url: '/usuario/trabajo/presupuesto',
            views: {
              '' : {
                templateUrl: '../frontend/app/user/job/myjob/myjob.html',
                controller: 'myjob'
              } ,
              'job@job': {      
                    templateUrl: '../frontend/app/user/job/myjob/partials/job.html',
                    controller: 'myjob'
               }
            }
        }).
        state('message',{
            url: '/usuario/trabajo/mensajes',
            views: {
              '' : {
                templateUrl: '../frontend/app/user/job/myjob/myjob.html',
                controller: 'myjob'
              } ,
              'message@message': {      
                    templateUrl: '../frontend/app/user/job/myjob/partials/message.html',
                    controller: 'myjob'
               }
            }
        }).
        state('califications',{
            url: '/usuario/trabajo/calificaciones',
            views: {
              '' : {
                templateUrl: '../frontend/app/user/job/myjob/myjob.html',
                controller: 'myjob'
              } ,
              'califications@califications': {      
                    templateUrl: '../frontend/app/user/job/myjob/partials/califications.html',
                    controller: 'myjob'
               }
            }
        });
    }    
})();