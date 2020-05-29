<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Repositories\Interfaces\EggGroupRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EggGroupController extends Controller
{

    /**
     * EggGroupController constructor.
     *
     * @param EggGroupRepositoryInterface $eggGroupRepository
     */
    public function __construct(EggGroupRepositoryInterface $eggGroupRepository)
    {
        $this->eggGroupRepository=$eggGroupRepository;
    }

    /**
     * return a JSON array of the pokemon associated with the group
     *
     * @param $group
     * @return AnonymousResourceCollection
     */
    public function show($group) {
        return PokemonResource::collection($this->eggGroupRepository->show($group));
    }
}
