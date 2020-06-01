<?php

namespace App\Services;

use App\Repositories\TypeRepository;

class TypeService
{
    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function show($type)
    {
        $result = $this->typeRepository->show($type);

        if ($result == false) {
            return $result;
        }
        return $result->pokemon();
    }
}
