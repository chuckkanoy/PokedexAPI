<?php

namespace App\Repositories;

use App\Ability;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class AbilityRepository implements AttributeRepositoryInterface {

    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return AnonymousResourceCollection
     */
    public function show($ability) {
        //grabs pokemon even by partial strings
        $ability = Ability::where('name', 'LIKE', '%'.$ability.'%')->first();

        if($ability == null) {
            return false;
        }

        return $ability;
    }
}
