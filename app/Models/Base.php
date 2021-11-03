<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public function cocktails(){
        return $this->hasMany('App\Models\Cocktail');
    }
}
