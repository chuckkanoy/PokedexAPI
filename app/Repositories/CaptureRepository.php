<?php

namespace App\Repositories;

use App\Notifications\Captured;
use App\Pokemon;
use App\Repositories\Interfaces\CaptureRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Auth;
use Illuminate\Support\Facades\Config;

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
     * remove desired pokemon from table
     *
     * @param $property
     * @param $pokemon
     * @return bool
     */
    private function removeFromTable($property, $pokemon) {
        //look for pokemon by id and release if not already captured
        if (Auth::user()->pokemon->contains(Pokemon::where($property, $pokemon)->firstOrFail())) {
            //add to table or fail
            $pokemon = Pokemon::where($property, $pokemon)->firstOrFail();
            $pokemon->users()->detach(Auth::user());
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check to see if query is string or not and try to capture
     *
     * @param $id
     * @return bool
     */
    public function capture($id)
    {
        $result = $this->addToTable('id', $id);

        if($result) {
            Auth::user()->notify(new Captured(Pokemon::where('id', $id)->firstOrFail()));
        }

        return $result;
    }

    public function release($id) {
        return $this->removeFromTable('id', $id);
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
            return Auth::user()->pokemon()->paginate(Config::get('constants.perpage'));
        }
    }
}
