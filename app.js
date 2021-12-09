var app = angular.module("appPlantilla", ['ui.router','ngMaterial','ngCookies', 'ngAnimate'])

app.constant('CONFIG', {

});


app.config(function($stateProvider, $urlRouterProvider, $httpProvider, $mdDateLocaleProvider) {

  $mdDateLocaleProvider.formatDate = function(date) {
      var m = moment(date);
      return  m.isValid() ? m.format('DD-MM-YYYY') : '';
  };

  $urlRouterProvider.otherwise('/prova');

  $stateProvider
      .state('prova', {
          url: '/prova',
          views: {
              '': {templateUrl: 'templates/principal.base.template.html'},
          },
      });

      $httpProvider.interceptors.push(['$q', '$location', '$cookies', '$rootScope', function($q, $location, $cookies, $rootScope) {
      return {
              'request': function (config) {
                  config.headers = config.headers || {};
                  if ($rootScope.centre) {
                      config.headers.Authorization = $rootScope.centre;
                  }
                  config.headers.Authorization = $rootScope.centre;
                  return config;
              },
              'responseError': function(response) {
                  if(response.status === 401 || response.status === 403) {
                      $location.path('/403');
                  }
                  return $q.reject(response);
              }
          };
      }]);


});

app.config(function($mdThemingProvider){

    $mdThemingProvider.alwaysWatchTheme(true);

    //Casp
    $mdThemingProvider.theme('1254')
    .primaryPalette('teal',{
        'hue-1': '800'
    })

    //Lleida
    $mdThemingProvider.theme('1255')
    .primaryPalette('orange',{
        'hue-1': '800'
    })

    //Sarria
    $mdThemingProvider.theme('1256')
    .primaryPalette('red',{
        'hue-1': '900'
    })

    //Poble Sec
    $mdThemingProvider.theme('1257')
    .primaryPalette('red',{
        'hue-1': '500'
    })

    //Clot
    $mdThemingProvider.theme('1258')
    .primaryPalette('deep-purple',{
        'hue-1': '800'
    })

    //Bellvitge
    $mdThemingProvider.theme('1259')
    .primaryPalette('blue',{
        'hue-1': '800'
    })

    //Sant Gervasi
    $mdThemingProvider.theme('1260')
    .primaryPalette('red',{
        'hue-1': '600'
    })

    //Gràcia
    $mdThemingProvider.theme('1261')
    .primaryPalette('green',{
        'hue-1': '800'
    })

})

app.run(function($http,$rootScope,$cookies,CONFIG){
  $rootScope.visible = true;
	var token = $cookies.get('tokenNet');


  // console.log(token)
  // var token = 'AC72CB4E-9C5C-4760-923F-1BA7EEF1DFA1';
  var urlValidacio = 'https://srv.net.fje.edu/apisiia/conNETctor.php/validatokenCookie/' + token;
  
  // var urlValidacio = 'http://srv.net.fje.edu/apisiia/conNETctor.php/validatokenCookie/543CE662-E08D-47BF-8404-31D042F98062';
  // var urlValidacio = 'http://srv.net.fje.edu/apisiia/conNETctor.php/validatokenCookie/05DBE228-D629-4BB3-9507-1C6031BA9E4B';

 
  $http.get(urlValidacio).success(function(resposta){
      // console.log(resposta)
      $rootScope.visible = true;
      $rootScope.login = resposta.login;


      switch (resposta.centre) {
        case 'casp':
          $rootScope.centre = 1254;
          break;
        case 'claver':
          $rootScope.centre = 1255;
          break;
        case 'santignasi':
          $rootScope.centre = 1256;
          break;
        case 'spclaver':
          $rootScope.centre = 1257;
          break;
        case 'clot':
          $rootScope.centre = 1258;
          break;
        case 'joan23':
          $rootScope.centre = 1259;
          break;
        case 'infantjesus':
          $rootScope.centre = 1260;
          break;
        case 'kostka':
          $rootScope.centre = 1261;
          break;
        default:
          $rootScope.centre = null;
          break;

      }
    });
      
$.urlParam = function(name){
   var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
   if (results==null){
    return null;
   } else{
    return results[1] || 0;
   }
  }
  //Globals
  $rootScope.centre = $.urlParam('centre');

      // $rootScope.centre = 1256;
      // // $rootScope.centre = 1259;
      $rootScope.centreNom = '';
      $rootScope.centreLogo = 'logo_fje_wh.png';






    // if(resposta.rol != "Familia"){
      // var urlCentreDades = '../data/index.php/centre.data/' + $rootScope.centre;
      // $http.get(urlCentreDades).success(function(resposta){
      //   $rootScope.centreNom = resposta.cenNom;
      //   $rootScope.centreLogo = resposta.cenLogoWH;
      // });
    // }else{
      // window.location.href = "http://www.fje.edu";
    // }
  // });


})

app.controller('toolbarCtrl',['$scope','$rootScope','$mdDialog','$location','$timeout','CONFIG','$http','$mdToast',toolbar]);
function toolbar($scope, $rootScope, $mdDialog, $location, $timeout, CONFIG,$http,$mdToast){
  
} 

app.controller('toastController', function ($scope, $mdToast) {
  $scope.closeToast = function() {
    $mdToast.hide();
  };
})

app.controller('AppCtrl', ['$interval',
    function($interval) {
      var self = this;

      self.activated = true;
      self.determinateValue = 30;

      // Iterate every 100ms, non-stop and increment
      // the Determinate loader.
      $interval(function() {

        self.determinateValue += 1;
        if (self.determinateValue > 100) {
          self.determinateValue = 30;
        }

      }, 100);
    }
  ]);
