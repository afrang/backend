<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductFeatureResource extends JsonResource
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
            'idfeature'=>$this->toAttr()->first()->id,
            'name'=>$this->toAttr()->first()->name,
            'icon'=>$this->toAttr()->first()->icon,
            'image'=>$this->toAttr()->first()->image,
            'value'=>$this->value,
            'help'=>$this->toAttr()->first()->to_attr,
            'mode'=>$this->toAttr()->first()->mode,
            'to_options'=>@$this->toAttr()->first()->toOptions()->where('id',$this->value)->first(),

        ];
    }
}
