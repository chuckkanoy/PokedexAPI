<?php

namespace App\Repositories;

use App\Repositories\Interfaces\LoginRepositoryInterface;
use App\User;
use Illuminate\Support\Str;
use Auth;

class LoginRepository implements LoginRepositoryInterface{

    /**
     * attempt to log user in
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
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

        return response()->json('Invalid user data', 401);
    }

    /**
     * log current user out of the system
     *
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function logout()
    {
        Auth::user()->api_token = "";
        Auth::user()->save();
        return response()->json('Logout successful', 200);
    }
}
