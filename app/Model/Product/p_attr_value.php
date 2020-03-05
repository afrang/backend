<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class p_attr_value extends Model
{
    protected  $fillable=['product','attr','value'];
}
