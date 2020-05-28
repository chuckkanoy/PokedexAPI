<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;

class PokemonController extends Controller
{
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

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            return $this->getResults($name);
        }
        return PokemonResource::collection(Pokemon::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return PokemonResource
     */
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
