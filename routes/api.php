<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//secure routes
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'LoginController@logout');
    Route::group(['prefix'=>'pokemon'], function () {
        Route::post('/{id}/capture', 'CaptureController@capture');
        Route::get('/captured', 'CaptureController@captured');
    });
});

//routes for pokemon
Route::group(['prefix'=>'pokemon'], function () {
    Route::get('/', 'PokemonController@index');
    //route for show using id
    Route::get('/{id}', 'PokemonController@show');
    //route for types
    Route::get('/types/{type}', 'TypeController@show');
    //route for egg groups
    Route::get('/groups/{group}', 'EggGroupController@show');
    //route for ability
    Route::get('/abilities/{ability}', 'AbilityController@show');
});

//route for login
Route::post('/login', 'LoginController@authenticate')->name('login');

//route for registration
Route::post('/register', 'UserController@store');

