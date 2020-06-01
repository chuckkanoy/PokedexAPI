<?php

namespace App\Http\Controllers;

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
        return response()->json(PokemonResource::collection(Pokemon::paginate(Config::get('constants.perpage')))->response()->getData(true),200);
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
            //generate error if necessary
            throw new ModelNotFoundException();
        }

        return new PokemonDetails($result);
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
            //generate error if necessary
            throw new ModelNotFoundException();
        }

        return PokemonResource::collection($result);
    }
}
