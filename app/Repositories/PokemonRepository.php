<?php

namespace App\Repositories;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;
use App\Repositories\Interfaces\LoginRepositoryInterface;
use App\Repositories\Interfaces\PokemonRepositoryInterface;
use App\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;
use Auth;

class PokemonRepository implements PokemonRepositoryInterface {

    /**
     * Query pokemon table for partial name match
     *
     * @param $name
     * @return AnonymousResourceCollection
     */
    private function getResults($name) {
        $results = Pokemon::where('name','LIKE', '%'.$name.'%')->paginate(10);

        if(count($results) == 0) {
            return response()->json('Not Found', 404);
        }

        return PokemonResource::collection($results);
    }

    public function index()
    {
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            return $this->getResults($name);
        }
        return PokemonResource::collection(Pokemon::paginate(10));
    }

    public function show($id)
    {
        if (ctype_digit($id)) {
            return new PokemonResource(Pokemon::find($id));
        } else {
            $name = $id;
            return $this->getResults($name);
        }
    }
}
