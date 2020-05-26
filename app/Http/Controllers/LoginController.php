<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        //validate user input and store in array
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //check attempt, login if valid
        if (Auth::attempt($validator)) {
            //logout all other users by clearing api tokens of other records
            User::where('api_token','<>', null)->update(['api_token'=>null]);
            //generate a random string for the token
            $token = Str::random(60);
            Auth::user()->api_token = $token;
            Auth::user()->save();
            return Auth::user();
        }
    }

    public function logout()
    {
        Auth::user()->api_token = "";
        Auth::user()->save();
        return "Logout successful";
    }
}
