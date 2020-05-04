<?php

namespace App\Model\Address;

use Illuminate\Database\Eloquent\Model;

class address_shahr extends Model
{
    function toOstan(){
        return $this->hasOne(address_ostan::class,'id','ostan');
    }
    function toShahrestan(){
        return $this->hasOne(address_shahrestan::class,'id','shahrestan');
    }
    function toFreeDeliver(){
        return $this->hasOne(address_delivery_citie::class,'city','id')->where('free',1);
    }
    function toFastDelivery(){
        return $this->hasOne(address_delivery_citie::class,'city','id')->where('fastsending',1);
    }
}
