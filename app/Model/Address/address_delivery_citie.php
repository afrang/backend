<?php

namespace App\Model\Address;

use Illuminate\Database\Eloquent\Model;

class address_delivery_citie extends Model
{
    function toCity(){
        return $this->hasOne(address_shahr::class,'id','city');
    }
}
