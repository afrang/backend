<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class p_price extends Model
{
    protected $fillable=['price','discount','parent','percent','attr'];
}
