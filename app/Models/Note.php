<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; //追記

class Note extends Model
{

    // use Sortable;//追記

    // public $sortable = ['cocktail_name','place','created_at'];//追記(ソートに使うカラムを指定

    public function user(){
        return $this->belongsTo('App\User');
    }
}
