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

Route::get('/', 'UserController@index' );
Route::post('/store', 'UserController@store' );
Route::post('/show', 'UserController@show');
Route::post('/edit', 'UserController@edit' );
Route::post('/update', 'UserController@update' );
Route::delete('/', 'UserController@delete' );
