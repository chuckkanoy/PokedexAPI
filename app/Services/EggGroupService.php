<?php

namespace App\Services;

use App\Http\Resources\AttributeResource;
use App\Http\Resources\Pokemon;
use App\Repositories\EggGroupRepository;
use Illuminate\Support\Facades\Config;

class EggGroupService {
    private $eggGroupRepository;
    /**
     * EggGroupService constructor.
     * @param EggGroupRepository $eggGroupRepository
     */
    public function __construct(EggGroupRepository $eggGroupRepository)
    {
        $this->eggGroupRepository= $eggGroupRepository;
    }

    /**
     * return pokemon associated with group
     * @param $group
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($group) {
        $result = $this->eggGroupRepository->show($group);
        return Pokemon::collection($result->paginate(Config::get('constants.perpage'))->appends(['group'=>$group]));
    }

    /**
     * return list of all egg groups
     * @return mixed
     */
    public function index() {
        return AttributeResource::collection($this->eggGroupRepository->index());
    }
}
