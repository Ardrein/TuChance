var appModule = angular.module('app',['ngRoute']);

appModule.config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider){


	$routeProvider
	.when('/',{
		redirectTo: 'index.html'
	})
	.when('/clientes',{
		templateUrl: 'views/clientes.html'
	})
	.when('/juegos',{
		templateUrl: 'views/juegos.html'
	})
	.when('/resultados',{
		templateUrl: 'views/resultados.html'
	})
	.when('/transacciones',{
		templateUrl: 'views/transacciones.html'
	})
	.when('/balance',{
		templateUrl: 'views/balance.html'
	})
	.when('/mensajes',{
		templateUrl: 'views/mensajes.html'
	})
	.otherwise({
		redirectTo: 'index.html'
	});


	//$locationProvider.html5Mode(true);

}]);