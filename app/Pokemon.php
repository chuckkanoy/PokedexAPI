<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $hidden = ["pivot"];
    protected $fillable = ['id', 'name', 'types', 'height', 'weight', 'abilities', 'egg_groups', 'stats', 'genus', 'description'];

    /**
     * Defines many to many relationship between abilities and pokemon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function abilities() {
        return $this->belongsToMany('App\Ability','pokemon_abilities');
    }

    /**
     * Defines many to many relationship between egg groups and pokemon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function egg_groups() {
        return $this->belongsToMany('App\EggGroup', 'pokemon_egg_groups');
    }

    /**
     * Defines many to many relationship between types and pokemon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types() {
        return $this->belongsToMany('App\Type', 'pokemon_types');
    }

    /**
     * Defines many to many relationship between users and pokemon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users() {
        return $this->belongsToMany('App\User', 'pokemon_users');
    }
}
