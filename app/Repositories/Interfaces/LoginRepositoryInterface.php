<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\LoginRequest;

interface LoginRepositoryInterface
{
    /**
     * grant user access if they have provided the appropriate data
     *
     * @param LoginRequest $request
     * @return mixed
     */
    public function authenticate(LoginRequest $request);

    /**
     * log user out of system by clearing their api token
     *
     * @return mixed
     */
    public function logout();
}
