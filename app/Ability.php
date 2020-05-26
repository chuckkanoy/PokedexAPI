<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $hidden = ["pivot"];

    /**
     * Defines many to many relationship between abilities and pokemon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pokemon(){
        return $this->belongsToMany('\App\Pokemon', 'pokemon_abilities');
    }
}
