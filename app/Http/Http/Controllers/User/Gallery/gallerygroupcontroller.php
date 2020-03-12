<?php

namespace App\Http\Controllers\User\Gallery;

use App\Http\Controllers\Controller;
use App\Model\Gallery\g_group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class gallerygroupcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(g_group $g_group)
    {
        return  $g_group->with('todetail')->get();
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
    public function store(Request $request,g_group $g_group)
    {
        $request->validate([
            'name'=>[
                'required',
            ],

            'urlname'=>[
                'required',
                'unique:g_groups,urlname'
            ]
        ]);
        $save               =new g_group();
        $save->name         =$request->name;
        $save->urlname      =$request->urlname;
        $save->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,g_group $g_group)
    {
        return $g_group->with('todetail')->where('id',$id)->first();
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
    public function update(Request $request, $id,g_group $g_group)
    {
        $request->validate([
            'name'=>[
                'required',
            ],

            'urlname'=>[
                'required',
                Rule::unique('g_groups','urlname')->ignore($id),

            ]
        ]);
        $save               =$g_group->find($id);
        $save->name         =$request->name;
        $save->text         =$request->text;
        $save->image         =$request->image;
        $save->urlname      =$request->urlname;
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
