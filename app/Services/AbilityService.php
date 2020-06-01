<?php

namespace App\Services;

use App\Repositories\AbilityRepository;

class AbilityService {
    public function __construct(AbilityRepository $abilityRepository)
    {
        $this->abilityRepository= $abilityRepository;
    }

    public function show($ability) {
        $result = $this->abilityRepository->show($ability);

        if($result == false) {
            return $result;
        }
        return $result -> pokemon();
    }
}
