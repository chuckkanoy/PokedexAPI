<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;

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
    Route::post('/pokemon/{id}/capture', 'CaptureController@capture');
    Route::get('/pokemon/captured', 'CaptureController@captured');
});

//route for login
Route::post('/login', 'LoginController@authenticate')->name('login');

//routes for registration
Route::post('/register', 'UserController@store');

//routes for pokemon
Route::get('/pokemon', function() {
    return PokemonResource::collection(Pokemon::paginate(10));
});

Route::get('/pokemon/{id}', function($id){
    return new PokemonResource(Pokemon::find($id));
});

//route for types
Route::get('pokemon/types/{type}', 'TypeController@show');

//route for egg groups
Route::get('pokemon/egggroups/{group}', 'EggGroupController@show');

//route for ability
Route::get('pokemon/abilities/{ability}', 'AbilityController@show');

