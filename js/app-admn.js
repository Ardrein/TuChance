var appModule = angular.module('app',['ngRoute']);

appModule.config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider){


	$routeProvider
	.when('/',{
		redirectTo: 'index.html'
	})
	.when('/clientes',{
		templateUrl: 'clientes.html'
	})
	.when('/empleados',{
		templateUrl: 'empleados.html'
	})
	.when('/agregar',{
		templateUrl: 'agregar.html'
	})
	.when('/balance',{
		templateUrl: 'balance.html'
	})
	.when('/mensajes',{
		templateUrl: 'mensajes.html'
	})
	.otherwise({
		redirectTo: 'index.html'
	});


	//$locationProvider.html5Mode(true);

}]);