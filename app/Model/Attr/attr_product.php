<?php

namespace App\Model\Attr;

use Illuminate\Database\Eloquent\Model;

class attr_product extends Model
{
    function toOptions(){
        return   $this->hasMany('App\Model\Attr\attr_product_option','parent','id');
    }
}
