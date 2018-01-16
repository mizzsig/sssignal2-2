<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::get('/about',  'AboutController@index');
Route::post('/about', 'AboutController@contactSent');

Route::get('/game', 'GameController@index');
Route::get('/game/{url}', 'GameController@game');

Route::get('/soft', 'SoftController@index');
Route::get('/soft/{url}', 'SoftController@soft');

Route::get('/column', 'ColumnController@index'); 
Route::get('/column/{url}', 'ColumnController@article');



