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

Route::get('/insert', 'storeData@store');
Route::get('/insertGenre', 'storeGenreData@store');
Route::get('/', 'mainController@index');
Route::get('/show', 'mainController@show');
Route::get('info/{id}', 'mainController@showMovieInfo');
Route::get('/home', 'HomeController@index');
Route::get('/search', 'mainController@search')->name('search');
Route::get('/portfolio', 'mainController@portfolio');
Auth::routes();
