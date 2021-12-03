function panelSeleccioBancFrasesCtrl($scope,bancFrases,alumne,scope,mdPanelRef,$timeout,$mdPanel){
  $scope.alumne = alumne
  $scope.bancFrases = bancFrases;
  $scope.parent = scope;
  console.log($scope.alumne)

  _.forEach(alumne.valorBanc, function(v){
    var buscaFrase = _.find($scope.bancFrases.frases, function(frase){return v.valor == frase.valor && v.guidBanc == frase.guidBanc})
    console.log(buscaFrase)
    if (buscaFrase != undefined) {
      buscaFrase.select = true
    }
  })
    // alumne.valorBanc.push(buscaFrase.valor)
  console.log($scope.bancFrases)
 
  function removeAccents(value) {
      return value
        .replace(/[à,á]/g, 'a')
        .replace(/[è,é]/g, 'e')
        .replace(/[ì,í,ï]/g, 'i')
        .replace(/[ò,ó]/g, 'o')
        .replace(/[ù,ú]/g, 'u');
  }

  $scope.ignoraAccents = function(item) {
      if (!$scope.filtrefrasesPanel)
          return true;
      var text = removeAccents(item.text.toLowerCase());
      console.log(item)

      // if (text === undefined) {
      //   var text = removeAccents(item.valor.toLowerCase());
      // }
      var search = removeAccents($scope.filtrefrasesPanel.toLowerCase());
      return text.indexOf(search) > -1;
  };

  // $scope.$on('tancarPanel', function() {
  $scope.tancarPanel = function(){
    mdPanelRef.close();
  }
}
  