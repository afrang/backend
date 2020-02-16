<?php

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\Model;

class b_article extends Model
{
    function  toArticle(){
       return $this->hasOne('App\Model\Blog\b_group','id','group');
    }
    function totags(){
        return $this->belongsToMany('App\Model\Tags\tag','attr_article_to_tag','tag','article');
    }
}
