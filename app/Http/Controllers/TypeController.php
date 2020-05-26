<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;

class TypeController extends Controller
{
    /**
     * return pokemon associated with type
     *
     * @param $type
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($type) {
        $type = Type::where('name', $type)->first();
        return PokemonResource::collection($type->pokemon);
    }
}
