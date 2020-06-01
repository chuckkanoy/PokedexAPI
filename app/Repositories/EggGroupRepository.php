<?php

namespace App\Repositories;

use App\EggGroup;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EggGroupRepository implements AttributeRepositoryInterface {

    /**
     * return a JSON array of the pokemon associated with the group
     *
     * @param $group
     * @return AnonymousResourceCollection
     */
    public function show($group) {
        //grabs pokemon even by partial strings
        $group = EggGroup::where('name', 'LIKE', '%'.$group.'%')->first();

        if($group == null) {
            return false;
        }

        return $group;
    }
}
