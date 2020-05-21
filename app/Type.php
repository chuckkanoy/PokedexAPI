<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function pokemon() {
        return $this->belongsToMany('App\Pokemon', 'pokemon_types');
    }
}
