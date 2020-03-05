<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class p_prodcut extends Model
{
   function toGroup(){
       return $this->hasOne(p_group::class,'id','parent');
   }
   function toImage(){
       return $this->hasMany(p_image::class,'parent','id');
   }
   function toAttr(){
       return $this->hasMany(p_attr_value::class,'product','id');
   }
}
