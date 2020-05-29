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
     * show pokemon based on id
     *
     * @param $id
     * @return PokemonResource
     */
    public function showID($id);

    public function showName($name);
}
