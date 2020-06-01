<?php

namespace App\Http\Controllers;

use App\Error;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\PokemonDetails as PokemonResource;
use App\Services\TypeService;
use App\Type;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class TypeController extends Controller
{

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

        return PokemonResource::collection($result->paginate(Config::get('constants.perpage'))->appends(['type'=>$type]));
    }

    /**
     * return all types
     *
     * @return AnonymousResourceCollection
     */
    public function index() {
        return AttributeResource::collection(Type::paginate(Config::get('constants.perpage')));
    }
}
