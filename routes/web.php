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
    return "ON";
});


$router->group(['namespace' => 'Berita'], function () use ($router) {
    $router->get('berita/all', 'BeritaController@getAll');
    $router->get('berita/pagination', 'BeritaController@getAllPagination');
    $router->post('berita/store', 'BeritaController@store');
    $router->delete('berita/{id}', 'BeritaController@delete');
    $router->post('berita/update', 'BeritaController@update');
});


