<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('/users/login', ['uses' => 'UsersController@getToken']);

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/saludo', function() {
    return 'Hola!!!!!';
});

$router->post('/users', ['uses' => 'UsersController@createUser']);

$router->group(['middleware' => ['auth']], function() use($router) {
    $router->get('/users', ['uses' => 'UsersController@index']);
    $router->get('/users/{id}', ['uses' => 'UsersController@getUser']);
});

$router->options('/users' function() {
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');	
});