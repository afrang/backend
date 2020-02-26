<?php

namespace App\Model\Attr;

use Illuminate\Database\Eloquent\Model;

class feature_attr extends Model
{
    protected  $fillable=['name'];
    function toOptions(){
     return   $this->hasMany('App\Model\Attr\feature_attr_option','parent','id');
    }
}
