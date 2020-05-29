<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Services\AbilityService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AbilityController extends Controller
{
    private $abilityRepository;

    public function __construct(AbilityService $abilityService)
    {
        $this->abilityService=$abilityService;
    }

    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return AnonymousResourceCollection
     */
    public function show($ability) {
        return PokemonResource::collection($this->abilityService->show($ability));
    }
}
