<?php

namespace App\Repositories\Interfaces;

use App\Http\Resources\PokemonDetails as PokemonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface PokemonRepositoryInterface
{

    /**
     * show pokemon based on id
     *
     * @param $id
     * @return PokemonResource
     */
    public function showID($id);

    /**
     * show pokemon based on name
     *
     * @param $name
     * @return mixed
     */
    public function showName($name);
}
