<?php

namespace App\Repositories;

use App\Notifications\UserRegistered;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface {

    /**
     * register a user in the system
     *
     * @param $user
     * @param $password
     * @return \Illuminate\Http\JsonResponse|mixed
     */
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

        //send notification and log info about registration
        $user->notify(new UserRegistered());
        Log::info($user->name.' registered an account!');
        //$email = $user->email;
        //Mail::to($email)->send(new PokedexRegistration());  //NOT SURE IF THIS IS THE CORRECT LAYER TO PUT THIS

        //send login request to login repository
        return $login->authenticate($new_request);
    }
}
