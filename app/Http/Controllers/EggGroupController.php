<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pokemon as PokemonResource;
use Illuminate\Http\Request;
use App\EggGroup;

class EggGroupController extends Controller
{
    /**
     * return pokemon associated with egg group parameter
     */
    public function show($group) {
        $group = Type::where('name', $group)->first();
        return PokemonResource::collection($group->pokemon);
    }
}
