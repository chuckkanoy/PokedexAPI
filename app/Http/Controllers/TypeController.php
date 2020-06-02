<?php

namespace App\Http\Controllers;

use App\Error;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Services\TypeService;
use App\Type;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class TypeController extends Controller
{

    /**
     * TypeController constructor.
     * @param TypeService $typeService
     */
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    /**
     * return pokemon associated with type
     *
     * @param $type
     * @return AnonymousResourceCollection
     */
    public function show($type) {
        $result = $this->typeService->show($type);

        return PokemonResource::collection($result->paginate(Config::get('constants.perpage'))->appends(['type'=>$type]));
    }

    /**
     * return all types
     *
     * @return AnonymousResourceCollection
     */
    public function index() {
        return AttributeResource::collection($this->typeService->index());
    }
}
