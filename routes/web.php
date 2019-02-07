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

$router->post('/', [
    'as' => 'geo.store', 'uses' => 'GeoController@store'
]);

$router->get('regions', ['as' => 'region.index', 'uses' => 'RegionController@index']);
$router->get('region/{id}', ['as' => 'region.show', 'uses' => 'RegionController@show']);
