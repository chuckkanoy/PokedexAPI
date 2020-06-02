<?php

namespace App\Http\Controllers;

use App\Ability;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Services\AbilityService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class AbilityController extends Controller
{

    /**
     * AbilityController constructor.
     * @param AbilityService $abilityService
     */
    public function __construct(AbilityService $abilityService)
    {
        $this->abilityService=$abilityService;
    }

    /**
     * Return the pokemon associated with a given ability
     *
     * @param $ability
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($ability) {
        //store the results of the method call as a resource collection
        $result = $this->abilityService->show($ability);
        $result = PokemonResource::collection($result->paginate(Config::get('constants.perpage'))->appends(['ability'=>$ability]));

        //return collection with status code
        return response()->json($result, 200);
    }

    /**
     * return all abilities
     *
     * @return AnonymousResourceCollection
     */
    public function index() {
        return AttributeResource::collection($this->abilityService->index());
    }
}
