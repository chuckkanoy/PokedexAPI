<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TypeRepositoryInterface;
use App\Http\Resources\Pokemon as PokemonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TypeController extends Controller
{
    private $typeRepository;

    public function __construct(TypeRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * return pokemon associated with type
     *
     * @param $type
     * @return AnonymousResourceCollection
     */
    public function show($type) {
        return PokemonResource::collection($this->typeRepository->show($type));
    }
}
