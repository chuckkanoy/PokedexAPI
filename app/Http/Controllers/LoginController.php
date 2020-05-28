<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * grant user access if they have provided the appropriate data
     *
     * @param LoginRequest $request
     * @return mixed
     */
    public function authenticate(LoginRequest $request)
    {
        //check attempt, login if valid
        if (Auth::attempt($request->only('email', 'password'))) {
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

    /**
     * log user out by clearing their api_token
     *
     * @return string
     */
    public function logout()
    {
        Auth::user()->api_token = "";
        Auth::user()->save();
        return response()->json('Logout successful', 200);
    }
}
