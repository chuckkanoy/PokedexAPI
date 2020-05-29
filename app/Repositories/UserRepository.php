<?php

namespace App\Repositories;


use App\Mail\PokedexRegistration;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class UserRepository implements UserRepositoryInterface {

    public function store($user, $password)
    {
        //login with newly made credentials through LoginController
        $login = new LoginRepository();
        //create new LoginRequest for authentication
        $new_request = [
            'email' => $user->email,
            'password' => $password
        ];
        //save user to database
        $user->save();

        //send email about registration
        $email = $user->email;
        Mail::to($email)->send(new PokedexRegistration());

        //send login request to login repository
        return $login->authenticate($new_request);
    }
}
