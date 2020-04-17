<?php

namespace App\Model\Product;

use App\Model\Attr\attr_product;
use Illuminate\Database\Eloquent\Model;

class p_attr_value extends Model
{
    protected  $fillable=['product','attr','value'];
    function toOptionValue(){
        return $this->hasMany(p_attr_option_value::class,'attr','id');
    }
    function toAttr(){
        return $this->hasOne(attr_product::class,'id','attr');
    }

}
