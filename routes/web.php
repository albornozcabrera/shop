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

// get es para leer datos
//post es
Route::get('/admin/products', 'ProductController@index'); //listado de productos
Route::get('/admin/products/create', 'ProductController@create'); //formulario de registro
Route::post('/admin/products', 'ProductController@store'); //guardar datos del usuario ingresado en el formulario

Route::get('/admin/products/{id}/edit', 'ProductController@edit'); //formulario de edición
Route::post('/admin/products/{id}/edit', 'ProductController@update');

Route::get('/admin/products/{id}/delete', 'ProductController@destroy'); //formulario de eliminar
//Route::post('/admin/products/{id}/delete', 'ProductController@update');