<?php

namespace App\Services;

use App\Repositories\AbilityRepository;
use App\Repositories\EggGroupRepository;
use App\Repositories\LoginRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class EggGroupService {
    public function __construct(EggGroupRepository $eggGroupRepository)
    {
        $this->eggGroupRepository= $eggGroupRepository;
    }

    public function show($group) {
        return $this->eggGroupRepository->show($group);
    }
}
