<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\RegisterRequest;

interface UserRepositoryInterface
{
    /**
     * Add new user to table if possible
     *
     * @param RegisterRequest $request
     */
    public function store(RegisterRequest $request);
}
