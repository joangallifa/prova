function llistaController($scope,$rootScope,$timeout,$mdPanel,$window,$http,$mdDialog){
	// CONTROLA EL CANVI DE TAMANY DE LA PANTALLA I RECALCULA LA ALTURA DE LA TAULA EN FUNCIO AL RESIZE
	var appWindow = angular.element($window);
	console.log(appWindow)
	appWindow.bind('resize', function () {
	// console.log('Resized your browser!!')

		$(document).ready(function() {
		  // $('.table-scroll').height($(window).height() - ($('#header').outerHeight() + $('#tabCursos').children().children().outerHeight() + $('#tabPestana').children().children().outerHeight()));
		  $('.table-scroll').css("height",$(window).height() -150+"px");
		});

	});

	$scope.calculaHeightTaula = function(){
		$(document).ready(function() {
		    // $('.table-scroll').height($(window).height() - ($('#header').outerHeight() + $('#tabCursos').children().children().outerHeight() + $('#tabPestana').children().children().outerHeight()));
		    $('.table-scroll').css("height",$(window).height() -100+"px");
		});
	}

	$scope.taulaCarregada = false;
	$scope.bloquejaOpcions = false
	$scope.allSelectCheck = false;
	$scope.dadesCarregades = 0;
	$scope.keyCamp = 'Nom';

	$scope.filtreCamp = {};
  	$scope.filtreCamp.nom = '';

  	$scope.sort = {
        column: '',
        descending: false
    };  

    $scope.campBuscador = 'Nom'

	//FUNCIÓ ENCARREGADA D'OBSERVAR ELS CANVIS EN EL SCOPE I ACTUALITZAR-LOS EN EL CONTROLLER
 	this.$onChanges = function(changesObj) {
 		console.log(changesObj)
		// $scope.taulaVisible = false;
		if(changesObj.guidLlista){
		  $scope.guidLlista = changesObj.guidLlista.currentValue;
		}
		// if(changesObj.parametreMostraLlista){
		//   $scope.mostraLlista = changesObj.parametreMostraLlista.currentValue;
		// }
		$scope.crearTaula();

		// $timeout(function(){
		//   $scope.taulaVisible = true;
		//   $timeout(function(){
		//     angular.element(".fixTable").tableHeadFixer({"left" : 1});
		//   }, 300);
		// }, 500);
	}

	$scope.crearTaula = function(){
		$http ({
			url: 'https://llistes.net.fje.edu/api/apis.php/donaInformacioLlista/'+$scope.guidLlista,
			// url: 'http://localhost/treballs/Angular/Llistator/api/apis.php/donaInformacioLlista/'+$scope.guidLlista,
			method: 'GET',
			headers : {'Content-Type' : 'application/json; charset=UTF-8'}
			}).then(function successCallback(response){


				$scope.informacioLlista = response.data.resultsInfo
				var dadesLlista_aux = response.data.resultsSentencia
				$scope.dadesLlista = [];

				const lowercaseKeys = obj =>
				  Object.keys(obj).reduce((acc, key) => {
				    acc[key.toLowerCase()] = obj[key];
				    return acc;
				  }, {});

				_.forEach(dadesLlista_aux, function(dadaLlista){
					lowercaseKeys(dadaLlista)
					$scope.dadesLlista.push(lowercaseKeys(dadaLlista))
				})
				// console.log($scope.dadesLlista)
				// $scope.informacioLlista[0].tipus = ['bolea']
				// $scope.informacioLlista[0].buscador = 'Nom'
				// $scope.informacioLlista[0].tipus = ['bolea','textarea']

				$scope.campsExtres = []
				if ($scope.informacioLlista[0].tipus == 'boolea'){
					var extra = {
						tipus: 'boolea',
						nomColumna: $scope.informacioLlista[0].TitolColumna
					}

					$scope.campsExtres.push(extra)
				}
				// $scope.campsExtres = [$scope.informacioLlista[0].tipus]
				// console.log($scope.campsExtres)

				$scope.nomCampsTaula = _.without(Object.keys($scope.dadesLlista[0]),'clau1','clau2');

				_.forEach($scope.dadesLlista, function(dades){
					dades.select = 'false';
				})

				// console.log($scope.informacioLlista)
				// console.log($scope.nomCampsTaula)
				// console.log($scope.informacioLlista)

				$scope.dadesCarregades = $scope.dadesCarregades+1;
				$rootScope.calculaDades();

			}, function errorCallback(response){
		});

		$http ({
			url: 'https://llistes.net.fje.edu/api/apis.php/donaValors/'+$scope.guidLlista,
			// url: 'http://localhost/treballs/Angular/Llistator/api/apis.php/donaValors/'+$scope.guidLlista,
			method: 'GET',
			headers : {'Content-Type' : 'application/json; charset=UTF-8'}
			}).then(function successCallback(response){

				$scope.valorsLlista = response.data.results	


				const lowercaseKeys = obj =>
				  Object.keys(obj).reduce((acc, key) => {
				    acc[key.toLowerCase()] = obj[key];
				    return acc;
				  }, {});

				_.forEach($scope.valorsLlista, function(valLlista){
					lowercaseKeys(valLlista)
				})
				// console.log($scope.valorsLlista)
				// $scope.taulaCarregada = true;

				$scope.dadesCarregades = $scope.dadesCarregades+1;
				$rootScope.calculaDades();

			}, function errorCallback(response){
		});
	}

	$scope.mostrarCella = function(key,value){
		if (key == 'select' || key == 'clau1' || key == 'clau2') {
			return false;
		}else{
			return true;
		}
	}

	$scope.determinaCampExtra = function(formatCamp){
		var campExtra = _.find($scope.campsExtres, function(camp){return camp.tipus == formatCamp})
		if (campExtra !== undefined) {
			return true
		}
	}

	$rootScope.calculaDades = function(){
		if ($scope.dadesCarregades == 2) {
			console.log('Totes les dades carregades!!')

			if ($scope.valorsLlista !== undefined) {
				console.log($scope.dadesLlista)
				console.log($scope.valorsLlista)
				_.forEach($scope.dadesLlista, function(data){
					var dataValor = _.find($scope.valorsLlista, function(valor){return valor.clau1 == data.clau1 && valor.clau2 == data.clau2});
					
					if (dataValor != undefined) {
						data.select = dataValor.valor;
					}else{
						data.select = false;
					}
				});
			}

			// console.log($scope.dadesLlista)
			$scope.taulaCarregada = true;

		}
	}

	$scope.allRegistres = function(){
		if ($scope.allSelectCheck == true) {
			_.forEach($scope.dadesLlista, function(data){
				data.select = 'false';
				$scope.allSelectCheck = false
			})
		}else{
			_.forEach($scope.dadesLlista, function(data){
				data.select = 'true';
				$scope.allSelectCheck = true
			})
		}
	}

	$scope.seleccionaRegistre = function(data){
		$timeout(function(){
			console.log(data.select)
		 //   if (data.select == 'false') {
		 //   	console.log('1')
		 //   	data.select = 'true'
		 //   }else{
		 //   	console.log('2')
		 //   	data.select = 'false'
		 //   }
			// console.log(data.select)
		}, 300);
	}

	$scope.mostrarLlistats = function(){
		$rootScope.mostraLlista = true;
		$rootScope.mostraComponentLlista = false;
	}

	$scope.procesDesarValors = function(ev){
		// @guidllista varchar(200),
		// @dusuariModifica varchar(100),
		// @valor varchar(1000),
		// @clau1 varchar(300),
		// @clau2 varchar(300)=Null

		if ($scope.valorsLlista === undefined) {
			var titleConfirmacio = 'Les dades seran desades, vol continuar?'
			var btnOk = 'Desa'
		}else{
			var titleConfirmacio = 'Les dades seran modificades, vol continuar?'
			var btnOk = 'Modifica'			
		}

		var confirm = $mdDialog.confirm()
			.title(titleConfirmacio)
			// .textContent('All of the banks have agreed to forgive you your debts.')
			.ariaLabel('Lucky day')
			.targetEvent(ev)
			.ok(btnOk)
			.cancel('Cancel·la');

		$mdDialog.show(confirm).then(function () {
			$scope.desaDades = true;
			$scope.bloquejaOpcions = true;

			var desaValorsObj = []

			_.forEach($scope.dadesLlista, function(dada){
				var registre = {
					guidLlista: $scope.informacioLlista[0].guidLlista,
					idUsuari: $rootScope.login,
					valor: dada.select,
					clau1: dada.clau1,
					clau2: dada.clau2
				}

				desaValorsObj.push(registre);
			})
			console.log(desaValorsObj);


			$http ({
				url: 'https://llistes.net.fje.edu/api/apis.php/desaValors',
				// url: 'http://localhost/treballs/Angular/Llistator/api/apis.php/desaValors',
				method: 'POST',
				data: JSON.stringify(desaValorsObj),
				headers : {'Content-Type' : 'application/json; charset=UTF-8'}
				}).then(function successCallback(response){
					console.log(response)
					$scope.desaDades = false;
					$scope.bloquejaOpcions = false

					// EN CAS DE DESAR PER PRIMER COP O HI HA ALGUN REGISTRE NOU I NO DESAT ANTERIORMENT, 
					// ACTUALITZEM DADES A VALORS LLISTA
					$scope.valorsLlista = $scope.dadesLlista

					$http ({
						url: 'https://llistes.net.fje.edu/api/apis.php/postDesaValors/'+$scope.guidLlista,
						// url: 'http://localhost/treballs/Angular/Llistator/api/apis.php/postDesaValors/'+$scope.guidLlista,
						method: 'GET',
						headers : {'Content-Type' : 'application/json; charset=UTF-8'}
						}).then(function successCallback(response){

							
						}, function errorCallback(response){
					});
				}, function errorCallback(response){
			});

		}, function () {
			// CLICK EN CANCEL.LA
		});
	}

    // $scope.purchases = $scope.dadesLlista;

    $scope.changeSorting = function(column) {
    	console.log('aqui')
    	console.log(column)

        var sort = $scope.sort;

        if (sort.column == column) {
            sort.descending = !sort.descending;
        } else {
            sort.column = column;
            sort.descending = false;
        }
    };
  
	

	// // //BUSCADOR ALUMNE
	// function removeAccents(value) {
 //        return value
 //          .replace(/[à,á]/g, 'a')
 //          .replace(/[è,é]/g, 'e')
 //          .replace(/[ì,í,ï]/g, 'i')
 //          .replace(/[ò,ó]/g, 'o')
 //          .replace(/[ù,ú]/g, 'u');
 //    }

 //    $scope.ignoraAccents = function(item) {
 //    	// $scope.alumnesFiltrats = ''
 //        if (!$scope.filtreCamp.$scope.campBuscador)
 //            return true;
 //        var text = removeAccents(item.Nom.toLowerCase());
 //        var search = removeAccents($scope.filtreCamp.$scope.campBuscador.toLowerCase());
 //        return text.indexOf(search) > -1;
 //    };

}

app.component('llista', {
	templateUrl: './components/llista/llista.template.html',
	controller: llistaController,
	scope: {},
	bindings: {
    	guidLlista:'@',
    	parametreMostraLlista: '<'
	}
})