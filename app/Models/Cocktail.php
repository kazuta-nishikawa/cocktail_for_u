<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    public function base(){
        return $this->belongsTo('App\Models\Base');
    }
    public function color(){
        return $this->belongsTo('App\Models\Color');
    }
    public function taste(){
        return $this->belongsTo('App\Models\Taste');
    }
    public function type(){
        return $this->belongsTo('App\Models\type');
    }
    public function method(){
        return $this->belongsTo('App\Models\type');
    }


    }
