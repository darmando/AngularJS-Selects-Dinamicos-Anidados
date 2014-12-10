var angularTodo = angular.module('selectsDesarrolloHidrocalido', []);
function controllerForm($scope, $http) {
      $scope.JSONCategorias = [ ];
      $scope.JSONPistos     = [ ];
      obtenerCategorias($http,$scope);
      // EVENTO QUE GENERA BOTON LIMPIAR
      $scope.limpiar = function() {
        limpiarForm($scope);
      };
      // EVENTO QUE GENERA LA DIRECTIVA ng-change
      $scope.mostrarPistos = function() { 
        // $scope.selCategorias NOS TRAE EL VALOR DEL SELECT DE CATEGORIAS
         obtenerPistos($http,$scope,$scope.selCategorias)
      };

 } 
  function obtenerPistos($http,$scope,idCategoria){
       $http.post('model/index.php',{ metodo : 'obtenerPistos' , idCategoria : idCategoria })
        .success(function(data) {
            var array = data == null ? [] : (data.pistos instanceof Array ? data.pistos : [data.pistos]);
            $scope.JSONPistos  = array;
            $scope.selPistos   = $scope.JSONPistos;
        })
        .error(function(data) {
            console.log('Error: ' + data);
        });    
  }
  function obtenerCategorias($http,$scope){
       $http.post('model/index.php',{ metodo : 'obtenerCategorias' })
        .success(function(data) {
            var array = data == null ? [] : (data.categorias instanceof Array ? data.categorias : [data.categorias]);
            $scope.JSONCategorias  = array;
            $scope.selCategorias   = $scope.JSONCategorias;
        })
        .error(function(data) {
            console.log('Error: ' + data);
        });    
  }
  function limpiarForm($scope){
    $scope.selPistos = '';
    $scope.selCategorias = '';
  }
