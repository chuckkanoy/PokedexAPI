<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Ability;

class AbilityController extends Controller
{
    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($ability) {
        $ability = Ability::where('name', $ability)->first();
        return PokemonResource::collection($ability->pokemon);
    }
}
