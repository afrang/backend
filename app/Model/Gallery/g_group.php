<?php

namespace App\Model\Gallery;

use Illuminate\Database\Eloquent\Model;

class g_group extends Model
{
   function togroup(){
       return $this->hasOne('App\Model\Gallery\g_detail','id','parent');
   }
}
