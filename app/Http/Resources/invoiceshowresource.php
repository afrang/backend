<?php

namespace App\Http\Resources;

use App\Model\Address\address_shahr;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\InvoiceDetailShowResouce;

class invoiceshowresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $city=address_shahr::where('id',$this->citynumber)->with('toOstan','toShahrestan')->first();
        return [
            'name'=>$this->name,
            'family'=>$this->family,
            'city'=>$city->name,
            'ostan'=>$city->toOstan->name,
            'Shahrestan'=>$city->toShahrestan->name,
            'fulladdress'=>$this->fulladdress,
            'fastpostprice'=>$this->fastpostprice,
            'mobile'=>$this->mobile,
            'offweekend'=>$this->offweekend,
            'offpercent'=>$this->offpercent,
            'tax'=>$this->tax,
            'trackingcode'=>$this->trackingcode,
            'persiandate'=>$this->persiandate,
            'status'=>$this->status,
            'postprice'=>$this->postprice,
            'payment'=>$this->payment,
            'paymentdate'=>$this->paymentdate,
            'paymentbank'=>$this->paymentbank,
            'description'=>$this->description,
            'postbarcode'=>$this->postbarcode,
            'shippingcode'=>$this->shippingcode,
            'adminmoment'=>$this->adminmoment,
            'deliverytext'=>$this->deliverytext,
            'postalcode'=>$this->postalcode,
            'user'=>@$this->toUser,
            'detail'=>InvoiceDetailShowResouce::collection($this->toDetial()->get())


            ];
    }
}
