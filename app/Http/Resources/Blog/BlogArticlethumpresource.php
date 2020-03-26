<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogArticlethumpresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'title'=>$this->title,
            'url'=>$this->url,
            'image'=>$this->image,
            'group'=>$this->toArticle->name,

        ];
    }
}
