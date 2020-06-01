<?php

namespace App\Http\Controllers;

use App\EggGroup;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\Pokemon;
use App\Services\EggGroupService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class EggGroupController extends Controller
{

    /**
     * EggGroupController constructor.
     *
     * @param EggGroupService $eggGroupService
     */
    public function __construct(EggGroupService $eggGroupService)
    {
        $this->eggGroupService=$eggGroupService;
    }

    /**
     * return a JSON array of the pokemon associated with the group
     *
     * @param $group
     * @return AnonymousResourceCollection
     */
    public function show($group) {

        $result = $this->eggGroupService->show($group);

        if(!$result){
            //generate error if necessary
            $error = [
                'error' => [
                    'code' => '404',
                    'message' => 'Not Found',
                    'more' => [

                    ]
                ]
            ];
            return response()->json($error, 404);
        }

        return Pokemon::collection($result->paginate(Config::get('constants.perpage'))->appends(['group'=>$group]));
    }

    /**
     * return all egg groups
     *
     * @return AnonymousResourceCollection
     */
    public function index() {
        return AttributeResource::collection(EggGroup::paginate(Config::get('constants.perpage')));
    }
}
