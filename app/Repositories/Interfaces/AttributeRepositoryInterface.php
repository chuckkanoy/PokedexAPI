<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface AttributeRepositoryInterface
{
    /**
     * return all pokemon associated with attribute
     *
     * @param $attribute
     * @return AnonymousResourceCollection
     */
    public function show($attribute);
}
