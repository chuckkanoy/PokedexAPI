<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CaptureRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;
use Auth;

class CaptureController extends Controller
{
    private $captureRepository;

    public function __construct(CaptureRepositoryInterface $captureRepository)
    {
        $this->captureRepository = $captureRepository;
    }

    /**
     * Check to see if query is string or not and try to capture
     *
     * @param $pokemon
     * @return JsonResponse
     */
    public function capture($pokemon)
    {
        return $this->captureRepository->capture($pokemon);
    }

    /**
     * return JSON array of pokemon captured by the user
     *
     * @return AnonymousResourceCollection
     */
    public function captured()
    {
        return $this->captureRepository->captured();
    }
}
