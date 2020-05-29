<?php

namespace App\Services;

use App\Repositories\CaptureRepository;
use App\Repositories\LoginRepository;
use App\Repositories\PokemonRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class CaptureService {
    public function __construct(CaptureRepository $captureRepository)
    {
        $this->captureRepository= $captureRepository;
    }

    public function capture($pokemon) {
        return $this->captureRepository->capture($pokemon);
    }

    public function captured() {
        return $this->captureRepository->captured();
    }
}
