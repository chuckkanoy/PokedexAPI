<?php

namespace App\Repositories;

use App\Pokemon;
use App\Repositories\Interfaces\PokemonRepositoryInterface;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Config;

class PokemonRepository implements PokemonRepositoryInterface
{

    /**
     * return pokemon based on id
     *
     * @param $id
     * @return \App\Http\Resources\PokemonDetails
     */
    public function showID($id)
    {
        //attempt to find pokemon by id
        $result = Pokemon::findOrFail($id);
        return $result;

    }

    /**
     * return pokemon based on name
     *
     * @param $name
     * @return mixed
     */
    public function showName($name)
    {
        //grab the pokemon with a similar name
        $results = Pokemon::where('name', 'LIKE', '%' . $name . '%')->paginate(Config::get('constants.perpage'));

        return $results->appends(['name' => $name]);
    }

    /**
     * return all pokemon
     *
     * @return mixed
     */
    public function index()
    {
        return Pokemon::paginate(Config::get('constants.perpage'));
    }
}
