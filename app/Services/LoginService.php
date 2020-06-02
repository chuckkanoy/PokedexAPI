<?php

namespace App\Services;

use App\Repositories\LoginRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginService {
    /**
     * LoginService constructor.
     * @param LoginRepository $loginRepository
     */
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository= $loginRepository;
    }

    /**
     * attempt to log user in
     * @param $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function authenticate($request) {
        //send user to repository for storage
        return $this->loginRepository->authenticate($request);
    }

    /**
     * log user out of the system
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function logout() {
        return $this->loginRepository->logout();
    }
}
