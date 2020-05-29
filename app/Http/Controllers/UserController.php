<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\UserService;


class UserController extends Controller
{

//    private $userRepository;
//
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Add new user to table if possible
     *
     * @param RegisterRequest $request
     */
    public function store(RegisterRequest $request)
    {
        //filter data from register request
        $request = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];

        //send to user service and return result
        return $this->userService->store($request);
    }
}
