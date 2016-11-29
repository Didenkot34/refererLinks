<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/link', 'LinkController@index');
Route::get('/bad-domains', 'BadDomainController@index');
Route::get('/click/{param1}/{param2}', 'LinkController@click');
Route::get('/success/{id}', 'ClickController@success');
Route::get('/error/{id}', 'ClickController@error');
