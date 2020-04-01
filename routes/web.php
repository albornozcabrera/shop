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

Route::get('/','TestController@welcome' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {    
	Route::get('/products', 'ProductController@index'); //listado de productos
	Route::get('/products/create', 'ProductController@create'); //formulario de registro
	Route::post('/products', 'ProductController@store'); //guardar datos del usuario ingresado en el formulario

	Route::get('/products/{id}/edit', 'ProductController@edit'); //formulario de edición
	Route::post('/products/{id}/edit', 'ProductController@update');

	//Route::get('/products/{id}/delete', 'ProductController@destroy'); //formulario de eliminar
	//Route::post('/products/{id}/delete', 'ProductController@destroy'); //formulario de eliminar
	Route::delete('/products/{id}', 'ProductController@destroy'); //formulario de eliminar
	//Route::post('/products/{id}/delete', 'ProductController@update');

	Route::get('/products/{id}/images', 'ImageController@index'); //listado
	Route::post('/products/{id}/images', 'ImageController@store'); //registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); //eliminar
});

// get es para leer datos
//post es