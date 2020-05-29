<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Auth;
use Session;

class LoginController extends Controller
{
    /**
     * LoginController constructor.
     *
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService=$loginService;
    }

    /**
     * grant user access if they have provided the appropriate data
     *
     * @param LoginRequest $request
     * @return mixed
     */
    public function authenticate(LoginRequest $request)
    {
        //filter data from login request
        $request = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        //send to service and return result
        return $this->loginService->authenticate($request);
    }

    /**
     * log user out by clearing their api_token
     *
     * @return string
     */
    public function logout()
    {
        return $this->loginService->logout();
    }
}
