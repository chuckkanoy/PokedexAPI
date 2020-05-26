<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EggGroup extends Model
{
    protected $hidden = ["pivot"];

    /**
     * Defines many to many relationship between egg groups and pokemon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pokemon() {
        return $this->belongsToMany('App\Pokemon', 'pokemon_egg_groups');
    }
}
