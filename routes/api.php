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

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

//routes for accessing pokemon
Route::get('/pokemon', function() {
    return PokemonResource::collection(Pokemon::paginate(10));
});
Route::get('/pokemon/{id}', function($id){
    return new PokemonResource(Pokemon::find($id));
});

//routes for user

