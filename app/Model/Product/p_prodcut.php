<?php

namespace App\Model\Product;

use App\Model\Tags\tag;
use Illuminate\Database\Eloquent\Model;

class p_prodcut extends Model
{
    function toTag(){
        return $this->belongsToMany(tag::class,'p_attr_pdetail_tags','tag','product');
    }
   function toGroup(){
       return $this->hasOne(p_group::class,'id','parent');
   }
   function toImage(){
       return $this->hasMany(p_image::class,'parent','id');
   }
   function toAttr(){
       return $this->hasMany(p_attr_value::class,'product','id');
   }
   function toFeature(){

   }
   function toPrice(){
       return $this->hasMany(p_price::class,'parent','id');
   }

}
