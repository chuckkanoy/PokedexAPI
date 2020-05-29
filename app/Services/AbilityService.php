<?php

namespace App\Services;

use App\Repositories\AbilityRepository;
use App\Repositories\LoginRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class AbilityService {
    public function __construct(AbilityRepository $abilityRepository)
    {
        $this->abilityRepository= $abilityRepository;
    }

    public function show($ability) {
        return $this->abilityRepository->show($ability);
    }
}
