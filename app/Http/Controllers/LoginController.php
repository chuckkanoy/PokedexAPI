<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Auth;
use Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(){
        return view('login');
    }

    public function authenticate(Request $request){
        //validate user input and store in array
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //check attempt, login if valid
        if(Auth::attempt($validator)) {
            return redirect('pokemon');
        } else {
            return view('login');
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return back();
    }
}
