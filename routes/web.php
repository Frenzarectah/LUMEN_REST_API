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


$router->get('/',['middleware' => ['example:ciao'], function () use ($router) {
    echo '<h1>Welcome to FrenzAPI service</h1>
          <h2>Login by the property endpoint to start!</h2>';
}]);
$router->get('/getUsers','UserController@getUsers');


$router->post('/login','Authcontroller@login');
$router->post('/addUser','UserController@addUser');
$router->delete('/delUser','UserController@delUser');
