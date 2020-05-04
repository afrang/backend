<?php

namespace App\Http\Resources;

use App\Model\Address\address_delivery_citie;
use App\Model\Address\invoice_post_price;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressShowResoure extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $priceevent=invoice_post_price::first();
          //return parent::toArray($request);
            if($this->toCity->toFreeDeliver!=null){
                $postprice=0;
            }else{
                $postprice=$priceevent->postprice;
            }
            if($this->toCity->toFastDelivery!=null){
                $fastpostprice=$priceevent->fastpostprice;

            }else{
                $fastpostprice=0;
            }
        return [
            'fulladdress'=>$this->toCity->toOstan->name.'-'.$this->toCity->toShahrestan->name.'-'.$this->toCity->name.'-'.$this->address.'-'.$this->no,
            'postalcode'=>$this->postalcode,
            'name'=>$this->name,
            'family'=>$this->family,
            'mobile'=>$this->mobile,
            'id'=>$this->id,
            'citynumber'=>$this->toCity->id,
            'phone'=>$this->phone,
            'postprice'=>$postprice,
            'fastpostprice'=>$fastpostprice

            ];
    }
}
