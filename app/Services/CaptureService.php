<?php

namespace App\Services;

use App\Repositories\CaptureRepository;
use App\Repositories\LoginRepository;
use App\Repositories\PokemonRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class CaptureService {
    /**
     * CaptureService constructor.
     * @param CaptureRepository $captureRepository
     */
    public function __construct(CaptureRepository $captureRepository)
    {
        $this->captureRepository= $captureRepository;
    }

    /**
     * add pokemon to captured table
     * @param $pokemon
     * @return bool
     */
    public function capture($pokemon) {
        return $this->captureRepository->capture($pokemon);
    }

    /**
     * return list of all pokemon captured
     * @return bool|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function captured() {
        return $this->captureRepository->captured();
    }
}
