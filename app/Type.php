<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $hidden = ["pivot"];

    public function pokemon() {
        return $this->belongsToMany('App\Pokemon', 'pokemon_types');
    }
}
