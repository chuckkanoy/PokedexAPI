<?php

namespace App\Services;

use App\Repositories\PokemonRepository;

class PokemonService {
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
        return $this->pokemonRepository->showID($id);
    }

    /**
     * return pokemon based on name
     * @param $name
     * @return mixed
     */
    public function showName($name) {
        return $this->pokemonRepository->showName($name);
    }

    /**
     * return all pokemon
     * @return mixed
     */
    public function index() {
        return $this->pokemonRepository->index();
    }
}
