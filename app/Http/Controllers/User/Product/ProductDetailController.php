<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductListResourceTable;
use App\Model\Product\p_prodcut;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,p_prodcut $p_prodcut)
    {

        return  ProductListResourceTable::collection($p_prodcut->with('toGroup')->paginate(1));
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
    public function store(Request $request,p_prodcut $prodcut)
    {
        $request->validate([
            'url'=>[
                'required',
                  'unique:p_groups,url'
            ],
            'name'=>[ 'required']

        ]);
        $save           = new $prodcut;
        $save->url      =$request->url;
        $save->name     =$request->name;
        $save->parent   =$request->parent;
        $save->save();
        return  $save;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,p_prodcut $p_prodcut)
    {
      return $p_prodcut->where('id',$id)->with(
          'toGroup',
          'toGroup.toFeature.toOptions',
          'toGroup.toTags',
          'toGroup.toAttr.toOptions',
          'toImage',
          'toPrice',
          'toAttr.toOptionValue'
            )->first();
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
    public function update(Request $request, $id,p_prodcut $prodcut)
    {
        $request->validate([
            'url'=>[
                'required',
                Rule::unique('p_prodcuts','url')->ignore($id),

            ],
            'name'=>[ 'required']

        ]);
        $save                       =$prodcut->find($id);
        $save->url                  =$request->url;
        $save->name                 =$request->name;
        $save->parent               =$request->parent;
        $save->title                =$request->title;
        $save->modelname            =$request->modelname;
        $save->model                =$request->model;
        $save->help                 =$request->help;
        $save->review               =$request->review;
        $save->description          =$request->description;
        $save->morecomment          =$request->morecomment;
        $save->status               =$request->status;
        $save->special              =$request->special;
        $save->installation         =$request->installation;
        $save->discount             =$request->discount;
        $save->expressdelivery      =$request->expressdelivery;
        $save->save();
       // return  $save;
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
