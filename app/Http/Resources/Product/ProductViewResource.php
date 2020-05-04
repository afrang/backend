<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductViewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'title'=>$this->title,
            'price'=>$this->toPrice()->where('attr','0')->first()->price,
            'discount'=>$this->toPrice()->where('attr','0')->first()->discount,
            'percent'=>$this->toPrice()->where('attr','0')->first()->percent,
            'url'=>$this->url,
            'model'=>$this->model,
            'help'=>$this->help,
            'review'=>$this->review,
            'morecomment'=>$this->morecomment,
            'description'=>$this->description,
            'status'=>$this->status,
            'special'=>$this->special,
            'toGroup'=>$this->toGroup,
            'toImage'=>$this->toImage,
            'toColor'=>$this->toColor,
            'installation'=>$this->installation,
            'expressdelivery'=>$this->expressdelivery,
            'colormode'=>$this->colormode,
            'groupname'=>$this->toGroup->name,
            'groupurl'=>$this->toGroup->url,
            'attr'=>ProductAttrViewResource::collection($this->toAttr),
            'feature'=>ProductFeatureResource::collection($this->toFeature)

        ];
    }
}
