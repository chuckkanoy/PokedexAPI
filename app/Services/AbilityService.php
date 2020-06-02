<?php

namespace App\Services;

use App\Repositories\AbilityRepository;

class AbilityService {
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
        return $this->abilityRepository->show($ability);
    }

    /**
     * return list of all abilities
     * @return mixed
     */
    public function index() {
        return $this->abilityRepository->index();
    }
}
