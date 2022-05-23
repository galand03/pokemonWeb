var app = angular.module('pokemon',  ['ngRoute','ngAnimate', 'ui.bootstrap']);

app.config(['$httpProvider', '$sceDelegateProvider', function($httpProvider, $sceDelegateProvider) {
   /*$httpProvider.defaults.useXDomain = true;
   delete $httpProvider.defaults.headers.common['X-Requested-With'];*/

   var baseUrlAPI = 'https://localhost:44336/Pokemon/Pokemon/';
   var localPath = baseUrlAPI + 'angularjs/'

   $sceDelegateProvider.resourceUrlWhitelist([
      'self', baseUrlAPI + 'getAll'
    ])

}]);

app.controller('MainCtrl', function($scope, $http) {
  $scope.Pokemons = {};
  $scope.cargando = false;
  $scope.showCard = false;
  cargarPokemons();
  

  $scope.pokemon = {
    id: null, 
    name: null,
    typeAheadFlag: false,
    readonly: true
  };

                    
  $scope.selectTypeAhead = function($item)	{
    $scope.pokemon = {};
    //typeahead provides us the ID
    $scope.pokemon.id = $item.name;
    $scope.pokemon.name = $item.name;
    //it has been modified by typeahead
    $scope.pokemon.typeAheadFlag = true;
    getPokemon($scope.pokemon.id);
  };
  
  // listener for client.firstName to look if it has been modified 
  // by typeahead or not (since only through typeahead the ID is informed)
  $scope.$watch('pokemon.name', function(newVal, oldVal)	{
		if($scope.pokemon.typeAheadFlag){
			$scope.pokemon.typeAheadFlag = false;
		} else {
		  //if not informed by typeahead we delete the id
      $scope.showCard = false;
		  $scope.pokemon.id = null;

		}
	    
	 });


  function cargarPokemons(){
    $scope.cargando = true;
    var YOUR_URL ="https://pokewebapi.herokuapp.com/Pokemon/Pokemon/getAll";
    //var YOUR_URL ="https://localhost:44336/Pokemon/Pokemon/getAll";

    $http({
      method: 'GET',
      url: YOUR_URL

    }).then(function(data, status, headers) {
      $scope.cargando = false;
      $scope.Pokemons = data.data;
    }, function(data, status, headers) {
      $scope.cargando = false;
      console.log = "Something went wrong";
    });
  }

  function getPokemon(name){
    $scope.cargando = true;
    $scope.showCard = false;
    var YOUR_URL ="https://pokewebapi.herokuapp.com/Pokemon/Pokemon/getByName/" + name;
    //var YOUR_URL ="https://localhost:44336/Pokemon/Pokemon/getByName/" + name;

    $http({
      method: 'GET',
      url: YOUR_URL

    }).then(function(data, status, headers) {
      $scope.cargando = false;
      //$scope.result = data;
      $scope.pokemon = data.data;
      $scope.pokemon.img = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/' + $scope.pokemon.id + '.png';
      $scope.showCard = true;
    }, function(data, status, headers) {
      $scope.showCard = false;
      $scope.cargando = false;
      console.log = "Error getPokemon";
    });
  }  
});