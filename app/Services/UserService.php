<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\User;

class UserService {
    /**
     * UserService constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * attempt to add user to database by the creation of a new user object
     * @param $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
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
