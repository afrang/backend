<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResourceTable extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
     //  return parent::toArray($request);
        return [
            'name'=>$this->name,
            'id'=>$this->id,
            'url'=>$this->url,
            'model'=>$this->model,
            'group'=>$this->toGroup->name,
            'idgroup'=>$this->toGroup->id,

        ];
    }
}
