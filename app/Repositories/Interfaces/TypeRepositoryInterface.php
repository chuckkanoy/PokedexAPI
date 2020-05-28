<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface TypeRepositoryInterface
{
    /**
     * return pokemon associated with type
     *
     * @param $type
     * @return AnonymousResourceCollection
     */
    public function show($type);
}
