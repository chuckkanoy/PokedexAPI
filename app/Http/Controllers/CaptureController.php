<?php

namespace App\Http\Controllers;

use App\Services\CaptureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\Pokemon as PokemonResource;
use Auth;
use Illuminate\Support\Facades\Config;

class CaptureController extends Controller
{

    /**
     * CaptureController constructor.
     * @param CaptureService $captureService
     */
    public function __construct(CaptureService $captureService)
    {
        $this->captureService = $captureService;
    }

    /**
     * Check to see if query is string or not and try to capture
     *
     * @param $pokemon
     * @return JsonResponse
     */
    public function capture($pokemon)
    {
        //make pokemon into an object
        if($this->captureService->capture($pokemon)) {
            return response()->json('Pokemon captured!', 201);
        } else {
            return response()->json('Pokemon already captured', 200);
        }
    }

    /**
     * Return all pokemon captured by a given user
     *
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function captured()
    {
        if(!$this->captureService->captured()){
            return response() -> json('No pokemon captured yet!', 200);
        }
        return PokemonResource::collection($this->captureService->captured()->paginate(Config::get('constants.perpage')));
    }
}
