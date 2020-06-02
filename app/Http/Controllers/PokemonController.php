<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Pokemon;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Http\Resources\PokemonDetails;
use App\Services\PokemonService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PokemonController extends Controller
{
    private $pokemonService;
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
     * return formatted pokemon
     *
     * @param PokemonRequest $request
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index(PokemonRequest $request)
    {
        $name = $request->input('name');
        //handle optional name parameter if necessary
        if(isset($name)){
            $result = $this->pokemonService->showName($name)->response()->getData(true);
            return response()->json($result, 200);
        }

        //send to pokemon service and return as resource
        $result = $this->pokemonService->index()->response()->getData(true);
        return response()->json($result,200);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return PokemonResource|JsonResponse
     */
    public function show(PokemonRequest $request)
    {
        $id = $request->id;
        $result = $this->pokemonService->showID($id)->response()->getData(true);
        return response()->json($result, 200);
    }
}
