<?php

namespace App\Services;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Http\Resources\PokemonDetails;
use App\Repositories\PokemonRepository;

class PokemonService {
    private $pokemonRepository;
    /**
     * PokemonService constructor.
     * @param PokemonRepository $pokemonRepository
     */
    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository= $pokemonRepository;
    }

    /**
     * return pokemon based on id
     * @param $id
     * @return \App\Http\Resources\PokemonDetails
     */
    public function showID($id) {
        $result = $this->pokemonRepository->showID($id);

        return new PokemonDetails($result);
    }

    /**
     * return pokemon based on name
     * @param $name
     * @return mixed
     */
    public function showName($name) {
        $result = $this->pokemonRepository->showName($name);
        return PokemonResource::collection($result);
    }

    /**
     * return all pokemon
     * @return mixed
     */
    public function index() {
        $result = $this->pokemonRepository ->index();
        return PokemonResource::collection($result);
    }
}
