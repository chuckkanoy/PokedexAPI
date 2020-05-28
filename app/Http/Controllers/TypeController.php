<?php

namespace App\Http\Controllers;

use App\Type;
use App\Http\Resources\Pokemon as PokemonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TypeController extends Controller
{
    /**
     * return pokemon associated with type
     *
     * @param $type
     * @return AnonymousResourceCollection
     */
    public function show($type) {
        $type = Type::where('name', 'LIKE', '%'.$type.'%')->firstOrFail();
        return PokemonResource::collection($type->pokemon()->paginate(10));
    }
}
