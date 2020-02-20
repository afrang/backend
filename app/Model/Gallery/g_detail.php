<?php

namespace App\Model\Gallery;

use Illuminate\Database\Eloquent\Model;

class g_detail extends Model
{
    function todetail(){
        return $this->hasMany('App\Model\Gallery\g_group','parent','id');
    }
}
