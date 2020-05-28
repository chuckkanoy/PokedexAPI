<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EggGroupRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EggGroupController extends Controller
{
    private $eggGroupRepository;

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
        return $this->eggGroupRepository->show($group);
    }
}
