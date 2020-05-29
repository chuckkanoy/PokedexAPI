<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\RegisterRequest;

interface UserRepositoryInterface
{
    /**
     * Add new user to table if possible
     *
     * @param $request
     * @param $password
     * @return mixed
     */
    public function store($request, $password);
}
