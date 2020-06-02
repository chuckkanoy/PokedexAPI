<?php

namespace App\Services;

use App\Repositories\TypeRepository;

class TypeService
{
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
        return $this->typeRepository->show($type);
    }

    /**
     * return list of all types
     * @return mixed
     */
    public function index() {
        return $this->typeRepository->index();
    }
}
