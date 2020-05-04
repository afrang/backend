<?php

namespace App\Http\Controllers\User\Invoice;

use App\Http\Controllers\Controller;
use App\Model\Address\invoice_post_price;
use Illuminate\Http\Request;

class delivery_price_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id,invoice_post_price $invoice_post_price)
    {
        return  $invoice_post_price->first();
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
    public function update(Request $request, $id,invoice_post_price $invoice_post_price)
    {
        $save                       =$invoice_post_price->find($id);
        $save->minfreepost          =$request->minfreepost;
        $save->postprice            =$request->postprice;
        $save->taxpercent           =$request->taxpercent;
        $save->offweekend           =$request->offweekend;
        $save->offpercent           =$request->offpercent;
        $save->fastpostprice        =$request->fastpostprice;
        $save->topdesc              =$request->topdesc;
        $save->bottomdesc           =$request->bottomdesc;
        $save->morning              =$request->morning;
        $save->afternoom            =$request->afternoom;
        $save->save();
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
