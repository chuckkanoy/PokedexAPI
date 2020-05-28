<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface AbilityRepositoryInterface
{
    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return AnonymousResourceCollection
     */
    public function show($ability);
}
