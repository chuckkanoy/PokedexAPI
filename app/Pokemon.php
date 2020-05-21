<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = ['id', 'name', 'types', 'height', 'weight', 'abilities', 'egg_groups', 'stats', 'genus', 'description'];

    /**
     * Get the abilities associated with the pokemon
     */
    public function abilities() {
        return $this->belongsToMany('App\Ability','pokemon_abilities');
    }
    /**
     * Get the egg groups associated with the pokemon
     */
    public function egg_groups() {
        return $this->belongsToMany('App\EggGroup', 'pokemon_egg_groups');
    }
    /**
     * Get the types associated with the pokemon
     */
    public function types() {
        return $this->belongsToMany('App\Type', 'pokemon_types');
    }
}
