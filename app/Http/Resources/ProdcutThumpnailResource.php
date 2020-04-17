<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdcutThumpnailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $price=$this->toPrice()->where('attr',0)->first();
        $image=$this->ToImage()->where('master',1)->where('show',1)->first();
        return [
            'name'=>$this->name,
            'id'=>$this->id,
            'url'=>$this->url,
            'model'=>$this->model,
            'group'=>$this->toGroup->name,
            'idgroup'=>$this->toGroup->id,
            'price'=>$price['price'],
            'discount'=>$price['discount'],
            'status'=>$this->status,
            'percent'=>$price['percent'],
            'image'=>$image['file'],
            'color'=>$this->toColor()->with('toColor')->get()
        ];
    }
}
