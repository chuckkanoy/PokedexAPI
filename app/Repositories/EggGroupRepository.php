<?php

namespace App\Repositories;

use App\EggGroup;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class EggGroupRepository implements AttributeRepositoryInterface
{

    /**
     * return a JSON array of the pokemon associated with the group
     *
     * @param $group
     * @return AnonymousResourceCollection
     */
    public function show($group)
    {
        //grabs pokemon even by partial strings
        $group = EggGroup::where('name', 'LIKE', '%' . $group . '%')->firstOrFail()->pokemon();
        return $group;
    }

    /**
     * return list of all egg groups
     *
     * @return mixed
     */
    public function index()
    {
        return EggGroup::paginate(Config::get('constants.perpage'));
    }
}
