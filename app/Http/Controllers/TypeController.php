<?php

namespace App\Http\Controllers;

use App\Error;
use App\Http\Requests\AttributeRequest;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Services\TypeService;
use App\Type;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class TypeController extends Controller
{

    private $typeService;

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
     * @param AttributeResource $request
     * @return AnonymousResourceCollection
     */
    public function show(AttributeRequest $request) {
        $type = $request -> type;
        $result = $this->typeService->show($type)->response()->getData(true);

        return response()->json($result, 200);
    }

    /**
     * return all types
     *
     * @return AnonymousResourceCollection
     */
    public function index() {
        $result = $this->typeService->index()->response()->getData(true);

        return response()->json($result, 200);
    }
}
