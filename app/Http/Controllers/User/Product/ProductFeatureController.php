<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use App\Model\Product\p_attr_feature_value;
use Illuminate\Http\Request;

class ProductFeatureController extends Controller
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
    public function store(Request $request,p_attr_feature_value $attr_feature_value)
    {

        $attr_feature_value->updateOrCreate(
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
    public function show($id,p_attr_feature_value $attr_feature_value)
    {
        return  $attr_feature_value->where('product',$id)->with('toAttr.toOptions','toOptionValue')->get();

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
    public function update(Request $request, $id,p_attr_feature_value $attr_feature_value)
    {
        $save       =$attr_feature_value->find($id);
        $save->value=$request->value;
        $save->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,p_attr_feature_value $attr_feature_value)
    {
       $del=$attr_feature_value->find($id);
       $del->delete();
    }
}
