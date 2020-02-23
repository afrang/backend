<?php

namespace App\Model\Attr;

use Illuminate\Database\Eloquent\Model;

class feature_attr extends Model
{
    function toOptions(){
        $this->hasMany('App\Model\Attr\feature_attr_option','parent','id');
    }
}
