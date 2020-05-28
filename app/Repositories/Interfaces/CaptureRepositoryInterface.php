<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface CaptureRepositoryInterface
{
    /**
     * Check to see if query is string or not and try to capture
     *
     * @param $pokemon
     * @return JsonResponse
     */
    public function capture($pokemon);

    /**
     * return JSON array of pokemon captured by the user
     *
     * @return AnonymousResourceCollection
     */
    public function captured();

}
