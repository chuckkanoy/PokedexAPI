<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\Interfaces\LoginRepositoryInterface;
use Auth;
use Session;

class LoginController extends Controller
{
    private $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository=$loginRepository;
    }

    /**
     * grant user access if they have provided the appropriate data
     *
     * @param LoginRequest $request
     * @return mixed
     */
    public function authenticate(LoginRequest $request)
    {
        return $this->loginRepository->authenticate($request);
    }

    /**
     * log user out by clearing their api_token
     *
     * @return string
     */
    public function logout()
    {
        return $this->loginRepository->logout();
    }
}
