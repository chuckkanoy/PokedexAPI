<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Ability;
use App\Repositories\Interfaces\AbilityRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AbilityController extends Controller
{
    private $abilityRepository;

    public function __construct(AbilityRepositoryInterface $abilityRepository)
    {
        $this->abilityRepository=$abilityRepository;
    }

    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return AnonymousResourceCollection
     */
    public function show($ability) {
        return $this->abilityRepository->show($ability);
    }
}
