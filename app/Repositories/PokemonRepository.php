<?php

namespace App\Repositories;

use App\Pokemon;
use App\Repositories\Interfaces\PokemonRepositoryInterface;
use Auth;
use Illuminate\Support\Facades\Config;

class PokemonRepository implements PokemonRepositoryInterface {

    public function showID($id)
    {
        $result = Pokemon::find($id);

        if($result == null) {
            return false;
        }

        return $result;
    }

    public function showName($name) {
        $results = Pokemon::where('name','LIKE', '%'.$name.'%')->paginate(Config::get('constants.perpage'));

        if(count($results) == 0) {
            return false;
        }

        return $results->appends(['name'=>$name]);
    }
}
