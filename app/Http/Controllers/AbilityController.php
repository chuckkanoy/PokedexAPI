<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Ability;

class AbilityController extends Controller
{
    /**
     * return pokemon associated with ability parameter
     */
    public function show($ability) {
        $ability = Ability::where('name', $ability)->first();
        return PokemonResource::collection($ability->pokemon);
    }
}
