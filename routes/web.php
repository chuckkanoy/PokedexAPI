<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//pokemon related routes
Route::get('/pokemon', 'PokemonController@index');
Route::post('/pokemon', 'PokemonController@store');
Route::get('/pokemon/create', 'PokemonController@create');
Route::get('/pokemon/{id}', 'PokemonController@show');
Route::get('/pokemon/{id}/edit', 'PokemonController@edit');
Route::put('/pokemon/{id}', 'PokemonController@update');

//users related routes
Route::get('users','UserController@index');
Route::post('/users', 'UserController@store');
Route::get('/users/create', 'UserController@create');
Route::get('/users/{id}', 'UserController@show');

//login routes
Route::get('/login', 'LoginController@show');
Route::post('/login', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@logout');
//Route::middleware('auth')->group(function(){
//    Route::post('/logout', 'LoginController@logout');
//    Route::get('/', 'PokemonController@index');
//});




