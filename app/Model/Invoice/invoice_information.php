<?php

namespace App\Model\Invoice;

use App\User;
use Illuminate\Database\Eloquent\Model;

class invoice_information extends Model
{
   function  toDetial(){
       return $this->hasMany(invoice_detail::class,'parent');
   }
   function toUser(){
       return $this->hasOne(User::class,'id','parent');
   }
}
