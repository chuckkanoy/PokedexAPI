<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PokemonRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;

class PokemonController extends Controller
{
    private $pokemonRepository;

    public function __construct(PokemonRepositoryInterface $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return $this->pokemonRepository->index();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return PokemonResource
     */
    public function show($id)
    {
        return $this->pokemonRepository->show($id);

    }
}
