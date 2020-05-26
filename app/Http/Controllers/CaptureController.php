<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;
use Auth;

class CaptureController extends Controller
{
    /**
     * Add a pokemon to user pokemon pivot table
     *
     * @param Pokemon $id
     */
    public function capture(Pokemon $id){
        if(!Auth::user()->pokemon->contains($id))
            $id->users()->attach(Auth::user());
        else {
            return "Pokemon already captured";
        }
        return "Pokemon captured!";
    }

    /**
     * return an array of the captured pokemon
     */
    public function captured(){
        return PokemonResource::collection(Auth::user()->pokemon);
    }
}
