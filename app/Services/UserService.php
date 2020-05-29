<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\User;

class UserService {
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function store($request) {
        //create object of user
        $user = new User();
        $user->name=$request['name'];
        $email = $request['email'];
        $user->email=$email;
        $password = $request['password'];
        $user->password = $password;

        //send user to repository for storage
        return $this->user->store($user, $request['password']);
    }
}
