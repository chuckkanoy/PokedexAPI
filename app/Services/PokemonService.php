<?php

namespace App\Services;

use App\Repositories\LoginRepository;
use App\Repositories\PokemonRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class PokemonService {
    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository= $pokemonRepository;
    }

    public function index() {
        return $this->pokemonRepository->index();
    }

    public function showID($id) {
        return $this->pokemonRepository->showID($id);
    }

    public function showName($name) {
        return $this->pokemonRepository->showName($name);
    }
}
