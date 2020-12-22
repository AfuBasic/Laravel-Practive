<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return "Welcome to Lesson One Application";
});

$router->get('/users', 'UserController@users');
$router->post('/users','UserController@createUser');
$router->post('/users/create-bank','BankController@create');
$router->get('/users/banks','BankController@getBanks');
$router->get('/users/get-user/{id}','UserController@getSingleUser');
