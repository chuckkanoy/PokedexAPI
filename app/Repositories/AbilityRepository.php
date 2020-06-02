<?php

namespace App\Repositories;

use App\Ability;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class AbilityRepository implements AttributeRepositoryInterface
{

    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return AnonymousResourceCollection
     */
    public function show($ability)
    {
        //tries to grab pokemon even by partial strings
        $ability = Ability::where('name', 'LIKE', '%' . $ability . '%')->firstOrFail()->pokemon();
        return $ability;
    }

    /**
     * return list of all abilities
     *
     * @return mixed
     */
    public function index()
    {
        return Ability::paginate(Config::get('constants.perpage'));
    }
}
