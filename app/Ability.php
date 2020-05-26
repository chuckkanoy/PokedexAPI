<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $hidden = ["pivot"];
    /**
     * pokemon associated with an ability
     */
    public function pokemon(){
        return $this->belongsToMany('\App\Pokemon', 'pokemon_abilities');
    }
}
