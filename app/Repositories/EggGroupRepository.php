<?php

namespace App\Repositories;

use App\EggGroup;
use App\Repositories\Interfaces\EggGroupRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EggGroupRepository implements EggGroupRepositoryInterface {

    /**
     * return a JSON array of the pokemon associated with the group
     *
     * @param $group
     * @return AnonymousResourceCollection
     */
    public function show($group) {
        //grabs pokemon even by partial strings
        $group = EggGroup::where('name', 'LIKE', '%'.$group.'%')->firstOrFail();
        return $group->pokemon()->paginate(10);
    }
}
