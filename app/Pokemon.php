<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pokemon extends Model
{
    protected $hidden = ["pivot"];
    protected $fillable = ['id', 'name', 'types', 'height', 'weight', 'abilities', 'egg_groups', 'stats', 'genus', 'description'];

    /**
     * Defines many to many relationship between abilities and pokemon
     *
     * @return BelongsToMany
     */
    public function abilities() {
        return $this->belongsToMany(Ability::class,'pokemon_abilities');
    }

    /**
     * Defines many to many relationship between egg groups and pokemon
     *
     * @return BelongsToMany
     */
    public function egg_groups() {
        return $this->belongsToMany(EggGroup::class, 'pokemon_egg_groups');
    }

    /**
     * Defines many to many relationship between types and pokemon
     *
     * @return BelongsToMany
     */
    public function types() {
        return $this->belongsToMany(Type::class, 'pokemon_types');
    }

    /**
     * Defines many to many relationship between users and pokemon
     *
     * @return BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, 'pokemon_users');
    }
}
