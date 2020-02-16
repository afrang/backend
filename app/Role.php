<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    function ToJob(){
       return $this->belongsToMany('App\Joblist','attr_roles','role','job');
    }
}
