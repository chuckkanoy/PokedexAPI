<?php

namespace App\Services;

use App\Http\Resources\AttributeResource;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Repositories\TypeRepository;
use Illuminate\Support\Facades\Config;

class TypeService
{
    private $typeRepository;
    /**
     * TypeService constructor.
     * @param TypeRepository $typeRepository
     */
    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * return all pokemon associated with type
     * @param $type
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($type)
    {
        $result = $this->typeRepository->show($type);
        return PokemonResource::collection($result->paginate(Config::get('constants.perpage'))->appends(['type'=>$type]));
    }

    /**
     * return list of all types
     * @return mixed
     */
    public function index() {
        $result = $this->typeRepository->index();
        return AttributeResource::collection($result);
    }
}
