<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EggGroup extends Model
{
    protected $hidden = ["pivot"];

    /**
     * Defines many to many relationship between egg groups and pokemon
     *
     * @return BelongsToMany
     */
    public function pokemon() {
        return $this->belongsToMany(Pokemon::class, 'pokemon_egg_groups');
    }
}
