<?php

namespace App\Services;

use App\Repositories\AbilityRepository;
use App\Repositories\EggGroupRepository;
use App\Repositories\LoginRepository;
use App\Repositories\TypeRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class TypeService {
    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository= $typeRepository;
    }

    public function show($type) {
        return $this->typeRepository->show($type);
    }
}
