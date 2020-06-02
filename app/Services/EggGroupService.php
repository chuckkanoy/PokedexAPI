<?php

namespace App\Services;

use App\Repositories\EggGroupRepository;

class EggGroupService {
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
        return $this->eggGroupRepository->show($group);
    }

    /**
     * return list of all egg groups
     * @return mixed
     */
    public function index() {
        return $this->eggGroupRepository->index();
    }
}
