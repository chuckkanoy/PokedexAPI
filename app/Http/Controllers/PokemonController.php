<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pokemon;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Services\PokemonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PokemonController extends Controller
{
    /**
     * PokemonController constructor.
     *
     * @param PokemonService $pokemonService
     */
    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        //handle optional name parameter if necessary
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            return $this->showName($name);
        }

        //send to pokemon service and return as resource
        return PokemonResource::collection($this->pokemonService->index());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return PokemonResource|JsonResponse
     */
    public function show($id)
    {
        //send id to service
        $result = $this->pokemonService->showID($id);

        //check if nothing was returned
        if(!$result){
            return response()->json('Not Found', 404);
        }

        return new PokemonResource($result);
    }

    /**
     * find pokemon based on name
     *
     * @param $name
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function showName($name) {
        $result = $this->pokemonService->showName($name);

        //check if nothing was returned
        if(!$result){
            return response()->json('Not Found', 404);
        }

        return PokemonResource::collection($this->pokemonService->showName($name));
    }
}
