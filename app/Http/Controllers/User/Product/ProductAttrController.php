<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use App\Model\Product\p_attr_option_value;
use App\Model\Product\p_attr_value;
use App\Model\Product\p_price;
use Illuminate\Http\Request;

class ProductAttrController extends Controller
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
    public function store(Request $request,p_attr_value $attr_value)
    {

        $attr_value->updateOrCreate(
            ['product'=>$request->product,'attr'=>$request->id],
            ['value'=>$request->value]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,p_attr_value $attr_value)
    {
        return  $attr_value->where('product',$id)->with('toAttr.toOptions','toOptionValue.toPrice')->get();

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
    public function destroy($id,p_attr_value $attr_value,p_price $p_price,p_attr_option_value $attr_option_value)
    {

        $delmaster=$attr_value->where('id',$id)->with('toOptionValue.toPrice')->first();
        if($delmaster->toOptionValue) {

            foreach ($delmaster->toOptionValue as $key) {
                if ($key->to_price) {
                    foreach ($key->to_price as $m) {
                        $p_price->where('id', $m->id)->delete();
                    }
                };
                $attr_option_value->where('id', $key->id)->delete();
            }
        }
        $delmaster->delete();
    }
}
