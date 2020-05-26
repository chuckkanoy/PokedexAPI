<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pokemon as PokemonResource;
use Illuminate\Http\Request;
use App\EggGroup;

class EggGroupController extends Controller
{
    /**
     * return a JSON array of the pokemon associated with the group
     *
     * @param $group
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($group) {
        $group = Type::where('name', $group)->first();
        return PokemonResource::collection($group->pokemon);
    }
}
