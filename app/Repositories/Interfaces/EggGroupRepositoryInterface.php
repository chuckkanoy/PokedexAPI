<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface EggGroupRepositoryInterface
{
    /**
     * return a JSON array of the pokemon associated with the group
     *
     * @param $group
     * @return AnonymousResourceCollection
     */
    public function show($group);
}
