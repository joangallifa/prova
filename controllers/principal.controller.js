app.controller('appLlistator',['$scope','$filter','$rootScope','$http','$location','$mdDialog','$mdPanel','$timeout','$interval','$q','$mdToast','$window',controllerPrincipal]);

function controllerPrincipal($scope, $filter, $rootScope,$http,$location,$mdDialog,$mdPanel,$timeout,$interval,$q,$mdToast,$window){

	$rootScope.mostraLlista = true;
	$rootScope.mostraComponentLlista = false;
	$scope.mostraMissatge = false;
	// console.log($rootScope.login);
	$http ({
      url: 'https://llistes.net.fje.edu/api/apis.php/donaLlistesUsuari/'+$rootScope.login,
      // url: 'http://localhost/treballs/Angular/Llistator/api/apis.php/donaLlistesUsuari/'+$rootScope.login,
      method: 'GET',
      headers : {'Content-Type' : 'application/json; charset=UTF-8'}
      }).then(function successCallback(response){
        // console.log(response)

        if (response.data.status == '0') {
        	$scope.mostraMissatge = true;
        }else{
        	$scope.llistatsUsuari = response.data.results
        }
        // $scope.nomCampsTaula = Object.keys($scope.llistatsUsuari[0]);
		// console.log($scope.nomCampsTaula)

      }, function errorCallback(response){
      	$rootScope.mostraLlista = false;
    });


	// var keys = Object.keys($scope.alumnes[0]);
	// console.log(keys)

	$scope.donaInformacioLlista = function(llista){
	    $scope.guidLlista = llista.guidLlista

	    $timeout(function(){
	    	$rootScope.mostraComponentLlista = true
	    	$rootScope.mostraLlista = false
		  }, 300);
		
	}
}