<?php

namespace App\Services;

use App\Repositories\EggGroupRepository;

class EggGroupService {
    public function __construct(EggGroupRepository $eggGroupRepository)
    {
        $this->eggGroupRepository= $eggGroupRepository;
    }

    public function show($group) {
        $result = $this->eggGroupRepository->show($group);

        if($result == false) {
            return $result;
        }
        return $result -> pokemon();
    }
}
