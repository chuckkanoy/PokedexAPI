<?php

namespace App\Services;

use App\Http\Resources\AttributeResource;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Repositories\AbilityRepository;
use Illuminate\Support\Facades\Config;

class AbilityService {
    private $abilityRepository;
    /**
     * AbilityService constructor.
     * @param AbilityRepository $abilityRepository
     */
    public function __construct(AbilityRepository $abilityRepository)
    {
        $this->abilityRepository= $abilityRepository;
    }

    /**
     * Return pokemon based on ability
     * @param $ability
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($ability) {
        $result = $this->abilityRepository->show($ability);

        return PokemonResource::collection($result->paginate(Config::get('constants.perpage'))->appends(['ability'=>$ability]));
    }

    /**
     * return list of all abilities
     * @return mixed
     */
    public function index() {
        return AttributeResource::collection($this->abilityRepository->index());
    }
}
