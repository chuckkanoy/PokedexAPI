<?php

namespace App\Repositories\Interfaces;

use App\Http\Resources\Pokemon as PokemonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface PokemonRepositoryInterface
{
    /**
     * Display listing of the pokemon resource
     *
     * @return AnonymousResourceCollection
     */
    public function index();

    /**
     * @param $id
     * @return PokemonResource
     */
    public function show($id);
}
