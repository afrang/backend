<?php

namespace App\Model\Product;

use App\Model\Attr\feature_attr;
use Illuminate\Database\Eloquent\Model;

class p_attr_feature_value extends Model
{
    protected  $fillable=['product','attr','value'];
    function toOptionValue(){
        return $this->hasMany(p_attr_feature_optvalue::class,'parent','id');
    }
    function toAttr(){
        return $this->hasOne(feature_attr::class,'id','attr');
    }

}
