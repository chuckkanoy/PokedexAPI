<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = ['id', 'name', 'types', 'height', 'weight', 'abilities', 'egg_groups', 'stats', 'genus', 'description'];
}
