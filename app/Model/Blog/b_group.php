<?php

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\Model;

class b_group extends Model
{
    function totags(){
        return $this->belongsToMany('App\Model\Tags\tag','attr_blog_g_tag','tag','blog');
    }
    function toArticle(){
        return $this->hasMany(b_article::class,'group','id');

    }
}
