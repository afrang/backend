<?php

namespace App\Model\Product;

use App\Model\Attr\p_color;
use Illuminate\Database\Eloquent\Model;

class p_attr_color_detail extends Model
{
    function toColor(){
        return $this->hasOne(p_color::class,'id','color');
    }
}
