<?php

namespace App\Repositories;

use App\Pokemon;
use App\Repositories\Interfaces\CaptureRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Auth;

class CaptureRepository implements CaptureRepositoryInterface {

    /**
     * Add desired pokemon to captured if possible
     *
     * @param $property
     * @param $pokemon
     * @return bool
     */
    private function addToTable($property, $pokemon) {
        //look for pokemon by id and capture if not already captured
        if (!Auth::user()->pokemon->contains(Pokemon::where($property, $pokemon)->firstOrFail())) {
            //add to table or fail
            $pokemon = Pokemon::where($property, $pokemon)->firstOrFail();
            $pokemon->users()->attach(Auth::user());
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check to see if query is string or not and try to capture
     *
     * @param $pokemon
     * @return bool
     */
    public function capture($pokemon)
    {
        return $this->addToTable('id', $pokemon);
    }

    /**
     * return all pokemon captured by user
     *
     * @return bool|AnonymousResourceCollection
     */
    public function captured()
    {
        $results = Auth::user()->pokemon;

        if(count($results) == 0) {
            return false;
        } else {
            return Auth::user()->pokemon();
        }
    }
}
