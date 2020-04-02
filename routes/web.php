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




// authentication routes
$router->post('login', 'AuthController@login');
$router->post('register', 'AuthController@register');
$router->post('logout', 'AuthController@logout');


//boards routes
$router->get('/boards', 'BoardController@index');
$router->post('/boards', 'BoardController@store');
$router->put('/boards/{board}', 'BoardController@update');
$router->get('/boards/{board}', 'BoardController@show');
$router->delete('/boards/{board}' , 'BoardController@destroy');

//list for card's routes
$router->get('/boards/{board}/list', 'ListController@index');
$router->post('/boards/{board}/list', 'ListController@store');
$router->put('/boards/{board}/list/{list}', 'ListController@update');
$router->get('/boards/{board}/list/{list}', 'ListController@show');
$router->delete('/boards/{board}/list/{list}' , 'ListController@destroy');

//cards routes
$router->get('/boards/{board}/list/{list}/card', 'CardController@index');
$router->post('/boards/{board}/list/{list}/card', 'CardController@store');
$router->put('/boards/{board}/list/{list}/card/{card}', 'CardController@update');
$router->get('/boards/{board}/list/{list}/card/{card}', 'CardController@show');
$router->delete('/boards/{board}/list/{list}/card/{card}' , 'CardController@destroy');