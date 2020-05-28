<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    protected $hidden = ["pivot"];

    /**
     * Defines many to many relationship between types and pokemon
     *
     * @return BelongsToMany
     */
    public function pokemon() {
        return $this->belongsToMany(Pokemon::class, 'pokemon_types');
    }
}
