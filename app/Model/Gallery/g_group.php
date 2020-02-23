<?php

namespace App\Model\Gallery;

use Illuminate\Database\Eloquent\Model;

class g_group extends Model
{
   function todetail(){
       return $this->hasMany('App\Model\Gallery\g_detail','parent','id')->orderBy('orders');
   }
}
