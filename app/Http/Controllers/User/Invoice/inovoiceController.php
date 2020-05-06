<?php

namespace App\Http\Controllers\User\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Resources\invoiceshowresource;
use App\Model\Address\user_addresses;
use App\Model\Invoice\invoice_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class inovoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,invoice_information $information)
    {
        $find=$information->with('toDetial','toUser')->where('trackingcode','LIKE','%'.$request->tracknumber.'%');
        if($request->status!='11'){
            $find=$find->where('status',$request->status);
        }
            $find=$find->orderBy('id','DESC')->paginate(10);
        return invoiceshowresource::collection($find);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,invoice_information $information)
    {
        return invoiceshowresource::make($information->with('toUser','toDetial')->where('trackingcode',$id)->first());

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
    public function update(Request $request, $id,invoice_information $information)
    {
      $save                     =$information->where('trackingcode',$id)->first();
      $save->status             =$request->status;
      $save->shippingcode       =$request->shippingcode;
      $save->postbarcode        =$request->postbarcode;
      $save->deliverytext       =$request->deliverytext;
      $save->description        =$request->description;
      $save->adminmoment        =$request->adminmoment;
      $save->save();
      return  $save;
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
