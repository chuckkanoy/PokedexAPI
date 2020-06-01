<?php

namespace App\Http\Controllers;

use App\Ability;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Services\AbilityService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class AbilityController extends Controller
{

    public function __construct(AbilityService $abilityService)
    {
        $this->abilityService=$abilityService;
    }

    /**
     * return pokemon related to the ability
     *
     * @param $ability
     * @return AnonymousResourceCollection
     */
    public function show($ability) {
        $result = $this->abilityService->show($ability);

        if(!$result){
            //generate error if necessary
            $error = [
                'error' => [
                    'code' => 'NOT FOUND',
                    'message' => 'Not Found',
                    'more' => [

                    ]
                ]
            ];
            return response()->json($error, 404);
        }

        return PokemonResource::collection($result->paginate(Config::get('constants.perpage'))->appends(['ability'=>$ability]));
    }

    /**
     * return all abilities
     *
     * @return AnonymousResourceCollection
     */
    public function index() {
        return AttributeResource::collection(Ability::paginate(Config::get('constants.perpage')));
    }
}
