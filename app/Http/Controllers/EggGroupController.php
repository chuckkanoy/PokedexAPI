<?php

namespace App\Http\Controllers;

use App\EggGroup;
use App\Http\Requests\AttributeRequest;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\Pokemon;
use App\Services\EggGroupService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class EggGroupController extends Controller
{
    private $eggGroupService;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(AttributeRequest $request) {
        $group = $request -> group;
        $result = $this->eggGroupService->show($group)->response()->getData(true);

        return response()->json($result, 200);
    }

    /**
     * return all egg groups
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $result = $this->eggGroupService->index()->response()->getData(true);
        return response()->json($result, 200);
    }
}
