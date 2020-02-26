<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class p_group extends Model
{
    function toColor(){
        return $this->belongsToMany('App\Model\Attr\p_color','p_attr_group_color','color','group');
    }
    function toTags(){
        return $this->belongsToMany('App\Model\Tags\tag','p_attr_group_tags','tag','group');
    }
    function toFeature(){
        return $this->belongsToMany('App\Model\Attr\feature_attr','p_attr_group_feature','feature','group');
    }
    function toAttr(){
        return $this->belongsToMany('App\Model\Attr\attr_product','p_attr_group_attribute','attr','group');
    }
}
