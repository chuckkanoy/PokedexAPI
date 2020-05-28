<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Ability;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AbilityController extends Controller
{
    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return AnonymousResourceCollection
     */
    public function show($ability) {
        $ability = Ability::where('name', 'LIKE', '%'.$ability.'%')->firstOrFail();
        return PokemonResource::collection($ability->pokemon()->paginate(10));
    }
}
