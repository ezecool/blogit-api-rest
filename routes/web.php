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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/saludo', function() {
    return 'Hola!!!!!';
});

$router->get('/users', ['uses' => 'UsersController@index']);
$router->post('/users', ['uses' => 'UsersController@createUser']);
$router->post('/users/login', ['uses' => 'UsersController@getToken']);
