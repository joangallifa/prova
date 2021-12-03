app.controller('appPlantilla',['$scope','$filter','$rootScope','$http','$location','$mdDialog','$mdPanel','$timeout','$interval','$q','$mdToast','$window',controllerPrincipal]);

function controllerPrincipal($scope, $filter, $rootScope,$http,$location,$mdDialog,$mdPanel,$timeout,$interval,$q,$mdToast,$window){
	console.log($rootScope.login)
	console.log('hola')

	$http ({
      url: 'https://llistes.net.fje.edu/api/apis.php/donaLlistesUsuari/'+$rootScope.login,
      // url: 'http://localhost/treballs/Angular/Llistator/api/apis.php/donaLlistesUsuari/'+$rootScope.login,
      method: 'GET',
      headers : {'Content-Type' : 'application/json; charset=UTF-8'}
      }).then(function successCallback(response){
        console.log(response)
		$scope.llistatsUsuari = response.data.results

      }, function errorCallback(response){
      	$rootScope.mostraLlista = false;
    });

}