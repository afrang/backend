<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductOptionAttrViewResouce extends JsonResource
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
            'id'=>$this->id,
            'price'=>$this->toPrice->price,
            'idprice'=>$this->toPrice->id,
            'discount'=>$this->toPrice->discount,
            'percent'=>$this->toPrice->percent,
            'name'=>$this->toOption->name,
            'icon'=>$this->toOption->icon,
            'image'=>$this->toOption->image,
            'help'=>$this->toOption->help,
        ];
    }
}
