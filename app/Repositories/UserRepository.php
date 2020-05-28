<?php

namespace App\Repositories;

use App\Http\Controllers\LoginController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface {

    public function store(RegisterRequest $request)
    {
        //create object of user
        $user = new User();
        $user->name=implode($request->only('name'));
        $email = implode($request->only('email'));
        $user->email=implode($request->only('email'));
        $password = implode($request->only('password'));

        //hash user password
        $user->setPasswordAttribute(implode($request->only('password')));

        $user->save();
        //login with newly made credentials through LoginController
        $login = new LoginController();
        //create new LoginRequest for authentication
        $new_request = new LoginRequest();
        $new_request -> replace([
            'email' => $email,
            'password' => $password
        ]);
        //return $new_request;
        return $login->authenticate($new_request);
    }
}
