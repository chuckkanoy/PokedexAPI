<?php

namespace App\Services;

use App\Repositories\LoginRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginService {
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository= $loginRepository;
    }

    public function authenticate($request) {
        //send user to repository for storage
        return $this->loginRepository->authenticate($request);
    }

    public function logout() {
        return $this->loginRepository->logout();
    }
}
