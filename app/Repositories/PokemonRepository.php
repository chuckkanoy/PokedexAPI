<?php

namespace App\Repositories;

use App\Pokemon;
use App\Repositories\Interfaces\PokemonRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Auth;

class PokemonRepository implements PokemonRepositoryInterface {

    /**
     * Query pokemon table for partial name match
     *
     * @param $name
     * @return AnonymousResourceCollection
     */
    private function getResults($name) {

    }

    public function index()
    {
        return Pokemon::paginate(10);
    }

    public function showID($id)
    {
        return Pokemon::findOrFail($id);
    }

    public function showName($name) {
        $results = Pokemon::where('name','LIKE', '%'.$name.'%')->paginate(10);

        if(count($results) == 0) {
            return false;
        }

        return $results;
    }
}
