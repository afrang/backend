<?php

namespace App\Http\Controllers\View\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductViewResource;
use App\Model\Product\p_prodcut;
use Illuminate\Http\Request;

class ProductViewController extends Controller
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
    public function show($id,p_prodcut $p_prodcut)
    {

        $product= $p_prodcut->where('url',$id)->with('toTag','toGroup','toImage','toAttr.toAttr','toAttr.toOptionValue.toPrice','toAttr.toOptionValue.toOption','toPrice','toColor.toColor','toFeature.toOptionValue','toFeature.toAttr.toOptions')->first();


        if($product==null){
            $product= $p_prodcut->where('id',$id)->with('toTag','toGroup','toImage','toAttr.toAttr','toAttr.toOptionValue.toPrice','toAttr.toOptionValue.toOption','toPrice','toColor.toColor','toFeature.toOptionValue','toFeature.toAttr.toOptions')->first();

        }
        if($product==null){
            return  abort(404);
        }

      //  return  $product->toFeature;
        return  ProductViewResource::make($product);
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
