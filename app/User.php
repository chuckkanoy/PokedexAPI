<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * modify password parameter using built in Hash method
     *
     * @param $password
     */
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Defines many to many relationship between users and pokemon
     *
     * @return BelongsToMany
     */
    public function pokemon() {
        return $this->belongsToMany(Pokemon::class, 'pokemon_users');
    }
}
