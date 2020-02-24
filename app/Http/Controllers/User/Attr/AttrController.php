<?php

namespace App\Http\Controllers\User\Attr;

use App\Http\Controllers\Controller;
use App\Model\Attr\attr_product;
use App\Model\Attr\feature_attr;
use Illuminate\Http\Request;

class AttrController extends Controller
{
    public function index(attr_product $attr_product)
    {
        return  $attr_product->with('toOptions')->get();
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
    public function store(Request $request,attr_product $feature_attr)
    {

        $request->validate([
            'name'=>[
                'required',
            ]
        ]);
        $save           =new $feature_attr;
        $save->name     =$request->name;
        $save->mode    =1;
        $save->save();
        return  $save;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,attr_product $feature_attr)
    {
        return  $feature_attr->with('toOptions')->where('id',$id)->first();
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
    public function update(Request $request, $id,attr_product $feature_attr)
    {
        $request->validate([
            'name'=>[
                'required',
            ]
        ]);
        $save           = $feature_attr->find($id);
        $save->name     =$request->name;
        $save->mode     =$request->mode;
        $save->icon     =$request->icon;
        $save->unit     =$request->unit;
        $save->image     =$request->image;
        $save->help     =$request->help;
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
