<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Http\Requests\CaptureRequest;
use App\Repositories\CaptureRepository;
use App\Repositories\PokemonRepository;
use App\Services\CaptureService;
use App\Services\PokemonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\Pokemon as PokemonResource;
use Auth;
use Illuminate\Support\Facades\Config;

class CaptureController extends Controller
{
    private $captureService;
    private $pokemonService;

    /**
     * CaptureController constructor.
     * @param CaptureService $captureService
     * @param PokemonService $pokemonService
     */
    public function __construct(CaptureService $captureService, PokemonService $pokemonService)
    {
        $this->captureService = $captureService;
        $this->pokemonService = $pokemonService;
    }

    /**
     * Check to see if query is string or not and try to capture
     *
     * @param $id
     * @return JsonResponse
     */
    public function capture(CaptureRequest $request)
    {
        $id = $request->id;
        //grab pokemon for string use
        $name = $this->pokemonService->showID($id)->name;

        //return appropriate response
        if($this->captureService->capture($id)) {
            return response()->json($name.' captured!', 201);
        } else {
            return response()->json($name.' already captured', 200);
        }
    }

    /**
     * Return all pokemon captured by a given user
     *
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function captured()
    {
        $result = $this->captureService->captured()->response()->getData(true);

        if(!$result){
            return response() -> json('No pokemon captured yet!', 200);
        }
        return response()->json($result, 200);
    }
}
