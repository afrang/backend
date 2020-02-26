<?php

namespace App\Model\Attr;

use Illuminate\Database\Eloquent\Model;

class attr_product extends Model
{
    protected  $fillable=['name'];

    function toOptions(){
        return   $this->hasMany('App\Model\Attr\attr_product_option','parent','id');
    }
}
