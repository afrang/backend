<?php

namespace App\Http\Controllers\View\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdcutThumpnailResource;
use App\Model\Product\p_prodcut;
use Illuminate\Http\Request;
use mysql_xdevapi\Collection;

class ProductSearchControllerView extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,p_prodcut $p_prodcut)
    {
        $list=null;
        if(isset($request->tag)){
            $list=$p_prodcut->whereHas('toTag',function ($uqery) use($request){
                $uqery->where('product',$request->tag);
            });


        }
      // return  $list->with('toGroup','toPrice','toImage')->get();
        return  ProdcutThumpnailResource::collection($list->with('toGroup','toPrice','toImage')->get());
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
        return  ProdcutThumpnailResource::make($p_prodcut->where('id',$id)->with('toGroup','toPrice','toImage')->first());

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
