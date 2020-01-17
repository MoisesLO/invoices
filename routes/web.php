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

Route::get('/customers',function(){
  $faker = Faker\Factory::create();

  $limit = 10;
  echo '<ul>';
  for ($i = 0; $i < $limit; $i++) {
    $customer = $faker->text(6) . ' - ' . $faker->unique()->email . ' - ' . $faker->phoneNumber;
    echo "<li> $customer</li>";
  }
  echo '</ul>';
});





