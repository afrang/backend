<?php

namespace App\Model\Tags;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable=['name'];
    function toArticle(){
        return $this->belongsToMany('App\Model\Blog\b_article','attr_article_to_tag','article','tag');
    }
    function toBlog(){
        return $this->belongsToMany('App\Model\Blog\b_group','attr_blog_g_tag','blog','tag');
    }
}
