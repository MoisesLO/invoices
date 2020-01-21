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

Route::get('/', function () {
    return view('home');
});

//Route::get('/login', function () {
//    return view('auth/login');
//});
//
//Route::get('/register', function () {
//    return view('auth/register');
//});

//Route::post('/registrar', 'AutenticacionController@registrar');
//Route::post('/login', 'AutenticacionController@login');
//
//Route::get('/datos', 'AutenticacionController@datos');
Route::get('/productos', 'ProductoController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/categorias', 'ProductoController@categorias')->name('categorias');
Route::post('/productos', 'ProductoController@productosGetAll')->name('productos');
Route::post('/productos/save', 'ProductoController@productosSave')->name('productosSave');

Route::post('/categorias/save', 'ProductoController@categoriasSaveNew')->name('categoriasSaveNew');
Route::post('/categorias/update', 'ProductoController@categoriasUpdate')->name('categoriasUpdate');
