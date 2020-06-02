<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

//route group for pokemon
Route::group(['prefix'=>'pokemon'], function () {
    Route::get('/', 'PokemonController@index');
    //route group for types
    Route::group(['prefix'=>'types'], function () {
        Route::get('/', 'TypeController@index');
        //route for showing specific types
        Route::get('/{type}', 'TypeController@show');
    });
    //route group for egg groups
    Route::group(['prefix'=>'groups'], function () {
        Route::get('/', 'EggGroupController@index');
        //route for showing specific egg groups
        Route::get('/{group}', 'EggGroupController@show');
    });
    //route group for abilities
    Route::group(['prefix'=>'abilities'], function () {
        Route::get('/', 'AbilityController@index');
        //route for showing specific ability
        Route::get('/{ability}', 'AbilityController@show');
    });
    //route for show using id
    Route::get('/{id}', 'PokemonController@show');
});

//route for login
Route::post('/login', 'LoginController@authenticate')->name('login');

//route for registration
Route::post('/register', 'UserController@store');

//route for unknown input or no user logged in
Route::fallback(function() {
    throw new NotFoundHttpException();
});

