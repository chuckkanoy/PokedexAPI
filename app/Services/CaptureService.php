<?php

namespace App\Services;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Repositories\CaptureRepository;
use App\Repositories\LoginRepository;
use App\Repositories\PokemonRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class CaptureService {
    private $captureRepository;
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
     * @param $id
     * @return bool
     */
    public function capture($id) {
        return $this->captureRepository->capture($id);
    }

    /**
     * return list of all pokemon captured
     * @return bool|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function captured() {
        $result = $this->captureRepository->captured();

        return PokemonResource::collection($result->paginate(Config::get('constants.perpage')));
    }
}
