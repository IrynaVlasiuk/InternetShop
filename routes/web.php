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

Route::get('/', 'HomeController@index');
Route::get('/category', 'HomeController@index');
Route::get('/show-more{id}', 'HomeController@show');
Route::get('/modification{id}', 'HomeController@modifications');
Route::get('//modification/{id}/value/{value}', 'HomeController@getProductsByModification');
