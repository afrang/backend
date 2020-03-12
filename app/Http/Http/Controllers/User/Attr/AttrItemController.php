<?php

namespace App\Http\Controllers\User\Attr;

use App\Http\Controllers\Controller;
use App\Model\Attr\attr_product_option;
use App\Model\Attr\feature_attr_option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttrItemController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,attr_product_option $attr_option)
    {
        $request->validate([
            'name'=>[
                'required',
            ]
        ]);
        $save           =new $attr_option;
        $save->name     =$request->name;
        $save->parent    =$request->parent;
        $save->save();
        return  $save;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id,attr_product_option $attr_option)
    {
        $request->validate([
            'name'=>[
                'required',
            ]
        ]);
        $save               =$attr_option->find($id);
        $save->name         =$request->name;
        $save->icon         =$request->icon;
        $save->image        =$request->image;
        $save->help         =$request->help;
        $save->save();
        return  $save;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,attr_product_option $attr_option)
    {
        $del            =$attr_option->find($id);
        Storage::disk('media')->deleteDirectory('attrproduct/'.$id);
        Storage::disk('filemanager')->deleteDirectory('attrproduct/'.$id);
        $del->delete();

    }
}
