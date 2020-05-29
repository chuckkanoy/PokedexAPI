<?php

namespace App\Repositories;

use App\Repositories\Interfaces\LoginRepositoryInterface;
use App\User;
use Illuminate\Support\Str;
use Auth;

class LoginRepository implements LoginRepositoryInterface{

    public function authenticate($request)
    {
        //return $request;
        //check attempt, login if valid
        if (Auth::attempt($request)) {
            //logout all other users by clearing api tokens of other records
            User::where('api_token','<>', null)->update(['api_token'=>null]);
            //generate a random string for the token
            $token = Str::random(60);
            Auth::user()->api_token = $token;
            Auth::user()->save();
            return Auth::user();
        }

        return response()->json('Invalid user data', 400);
    }

    public function logout()
    {
        Auth::user()->api_token = "";
        Auth::user()->save();
        return response()->json('Logout successful', 200);
    }
}
