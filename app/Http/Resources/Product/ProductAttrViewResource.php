<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttrViewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
 //   return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->toAttr->name,
            'icon'=>$this->toAttr->icon,
            'unit'=>$this->toAttr->unit,
            'image'=>$this->toAttr->image,
            'help'=>$this->toAttr->help,
            'pricemode'=>$this->toAttr->pricemode,
            'option'=>ProductOptionAttrViewResouce::collection($this->toOptionValue),



        ];
    }
}
