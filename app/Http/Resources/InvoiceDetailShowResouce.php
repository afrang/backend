<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceDetailShowResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'Qty'=>$this->Qty,
            'attrvalue'=>$this->attrvalue,
            'attrvalue'=>$this->attrvalue,
            'colorcode'=>$this->colorcode,
            'discount'=>$this->discount,
            'modelname'=>$this->modelname,
            'optionvalue'=>$this->optionvalue,
            'parentproduct'=>$this->parentproduct,
            'price'=>$this->price,
            'productname'=>$this->productname,
            'status'=>$this->status,
            'total'=>$this->Qty*$this->price,
            'totaldiscount'=>($this->Qty*$this->price)-($this->Qty*$this->discount),
        ];
    }
}
