<?php

namespace App\Services;

use App\Repositories\PokemonRepository;

class PokemonService {
    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository= $pokemonRepository;
    }

    public function showID($id) {
        return $this->pokemonRepository->showID($id);
    }

    public function showName($name) {
        return $this->pokemonRepository->showName($name);
    }
}
