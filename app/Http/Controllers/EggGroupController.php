<?php

namespace App\Http\Controllers;

use App\EggGroup;
use App\Http\Resources\Pokemon as PokemonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EggGroupController extends Controller
{
    /**
     * return a JSON array of the pokemon associated with the group
     *
     * @param $group
     * @return AnonymousResourceCollection
     */
    public function show($group) {
        $group = EggGroup::where('name', 'LIKE', '%'.$group.'%')->firstOrFail();
        return PokemonResource::collection($group->pokemon()->paginate(10));
    }
}
