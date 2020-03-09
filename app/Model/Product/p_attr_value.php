<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class p_attr_value extends Model
{
    protected  $fillable=['product','attr','value'];
    function toOptionValue(){
        return $this->hasMany(p_attr_option_value::class,'parent','id');
    }

}
