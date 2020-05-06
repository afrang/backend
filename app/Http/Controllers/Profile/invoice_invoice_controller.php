<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Invoice\invoice_detail_controller;
use App\Http\Resources\invoiceshowresource;
use App\Model\Invoice\invoice_detail;
use App\Model\Invoice\invoice_information;
use App\Model\Product\p_prodcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class invoice_invoice_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,invoice_information $information)
    {
       return invoiceshowresource::collection($information->where('parent',Auth::id())->with('toDetial')->where('trackingcode','LIKE','%'.$request->tracknumber.'%')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,invoice_information $information)
    {

       $save                            = new $information;
       $save->parent                    =Auth::id();
       $save->name                      =$request->address['name'];
       $save->family                    =$request->address['family'];
       $save->fastpostprice             =$request->address['fastpostprice'];
       $save->mobile                    =$request->address['mobile'];
       $save->phone                     =$request->address['phone'];
       $save->postalcode                =$request->address['postalcode'];
       $save->postprice                 =$request->address['postprice'];
       $save->tax                       =$request->address['tax'];
       $save->offpercent                =$request->address['offpercent'];
       $save->offweekend                =$request->address['offweekend'];
       $save->citynumber                =$request->address['citynumber'];
       $save->fulladdress               =$request->address['fulladdress'];
       $save->trackingcode              ='BC'.date('Ymd').rand(1111,9999);
       $save->persiandate               =jdate();
       $save->save();
        foreach ($request->sabad as $key){
             self::addinvoiceitem($key,$save->id);
        }

    }
    private  function addinvoiceitem($item,$parent){

           $save                            =new invoice_detail();
           $save->Qty                       =$item['Qty'];
           $save->productname              =$item['Qty'];
           $save->modelname                 =$item['Qty'];
           $save->colorname                 =@$item['color']['to_color']['name'];
           $save->colorcode                 =@$item['color']['to_color']['code'];
           $save->attrvalue                 =@$item['selectedOptions']['attrvalue']['name'].':'.@$item['selectedOptions']['optionvalue']['name'];
           $save->optionvalue               =@$item['option']['attrvalue']['name'].':'.@$item['option']['optionvalue']['name'];
           $save->parentproduct             =$item['product'];

           $product=p_prodcut::where('id',$item['product'])->with('toPrice')->first();
           $price=@$product->toPrice()->where('attr',0)->first()->price;
           $discount=@$product->toPrice()->where('attr',0)->first()->discount;

          if(isset($item['selectedOptions'])){
            if($item['selectedOptions']['optionvalue']['price']!=0){
                $price=$item['selectedOptions']['optionvalue']['price'];
                $discount=$item['selectedOptions']['optionvalue']['discount'];
            }
          }
        if(isset($item['option'])){
            if($item['option']['optionvalue']['price']!=0){
                $price=$item['option']['optionvalue']['price']+$price;

            }
        }
          $save->price                     =$price;
          $save->discount                  =$discount;
          $save->productname                =$product->name;
          $save->modelname                  =$product->model;
          $save->parent                     =$parent;

          $save->save();

          // $save->
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,invoice_information $information)
    {
        return invoiceshowresource::make($information->where('parent',Auth::id())->with('toDetial')->where('trackingcode',$id)->first());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
