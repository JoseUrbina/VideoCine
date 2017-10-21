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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('landing.index');
});

Route::view('/welcome', 'welcome');


Route::group(['middleware' => 'Admin' , 'prefix' => 'admin'], function () {
    Route::view('dashadmin', 'admin.dashadmin');
    Route::resource('categoria','CategoriaController');
    Route::resource('padmin', 'AdminController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('pelicula','PeliculaController');
});

