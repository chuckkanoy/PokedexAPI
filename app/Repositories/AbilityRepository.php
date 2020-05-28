<?php

namespace App\Repositories;

use App\Models\Ability;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Repositories\Interfaces\AbilityRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AbilityRepository implements AbilityRepositoryInterface {

    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return AnonymousResourceCollection
     */
    public function show($ability) {
        //grabs pokemon even by partial strings
        $ability = Ability::where('name', 'LIKE', '%'.$ability.'%')->firstOrFail();
        return PokemonResource::collection($ability->pokemon()->paginate(10));
    }
}
