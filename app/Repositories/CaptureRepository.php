<?php

namespace App\Repositories;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;
use App\Repositories\Interfaces\CaptureRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Auth;

class CaptureRepository implements CaptureRepositoryInterface {

    /**
     * Add desired pokemon to captured if possible
     *
     * @param $property
     * @param $pokemon
     * @return JsonResponse
     */
    private function addToTable($property, $pokemon) {
        //look for pokemon by id and capture if not already captured
        if (!Auth::user()->pokemon->contains(Pokemon::where($property, $pokemon)->firstOrFail())) {
            //add to table or fail
            $pokemon = Pokemon::where($property, $pokemon)->firstOrFail();
            $pokemon->users()->attach(Auth::user());
            return response()->json('Pokemon captured!', 201);
        } else {
            return response()->json('Pokemon already captured', 200);
        }
    }
    /**
     * Check to see if query is string or not and try to capture
     *
     * @param $pokemon
     * @return JsonResponse
     */
    public function capture($pokemon)
    {
        //check if integer
        if(ctype_digit($pokemon)) {
            return $this->addToTable('id', $pokemon);
        } else {
            return $this->addToTable('name', $pokemon);
        }
    }

    /**
     * return JSON array of pokemon captured by the user
     *
     * @return AnonymousResourceCollection
     */
    public function captured()
    {
        $results = Auth::user()->pokemon;

        if(count($results) == 0) {
            return response() -> json('No pokemon captured yet!', 200);
        } else {
            return PokemonResource::collection(Auth::user()->pokemon()->paginate(10));
        }
    }
}
