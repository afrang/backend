<?php

namespace App\Model\Address;

use Illuminate\Database\Eloquent\Model;

class user_addresses extends Model
{
    protected  $table='user_address';
    function toCity(){
        return $this->hasOne(address_shahr::class,'id','city');
    }
}
