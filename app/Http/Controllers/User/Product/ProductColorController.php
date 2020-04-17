<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use App\Model\Product\p_attr_color_detail;
use Illuminate\Http\Request;

class ProductColorController extends Controller
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
    public function store(Request $request,p_attr_color_detail $attr_color_detail)
    {
        $max=$attr_color_detail->where('product',$request->id)->max('ordered');
        if($attr_color_detail
            ->where('product',$request->id)
            ->where('color',$request->color)
            ->first() ==null
        ){
        $save=          new $attr_color_detail;
        $save->color    =$request->color;
        $save->product    =$request->id;
        $save->existing    =1;
        $save->ordered    =$max+1;
        $save->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,p_attr_color_detail $attr_color_detail)
    {
        return  $attr_color_detail->where('product',$id)->with('toColor')->orderby('ordered')->get();
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
    public function update(Request $request, $id,p_attr_color_detail $attr_color_detail)
    {

        $save               =$attr_color_detail->find($request->id);

     $save->existing     =$request->existing;
     $save->image        =$request->image;
        $save->save();
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,p_attr_color_detail $attr_color_detail)
    {
        $attr_color_detail->where('id',$id)->first()->delete();
    }
    public function colororderup($id,p_attr_color_detail $attr_color_detail){
        $color=$attr_color_detail->find($id);
        $product=$color->product;

        $max=$attr_color_detail->where('product',$product)->first()->min('ordered');
        if($color->ordered==$max){
            return 'Is up to list';
        }
        $findme=$attr_color_detail->where('product',$product)
            ->where('ordered','<',$color->ordered)->orderBy('ordered','DESC')->first();

        $currentordred=$color->ordered;
        $replaceordred=$findme->ordered;
        $findme->ordered=$currentordred;
        $findme->save();
        $color->ordered=$replaceordred;
        $color->save();
        return $color;
    }
    public function colororderdown($id,p_attr_color_detail $attr_color_detail){
        $color=$attr_color_detail->find($id);
        $product=$color->product;

        $max=$attr_color_detail->where('product',$product)->first()->max('ordered');
        if($color->ordered==$max){
            return 'Is up to list';
        }
        $findme=$attr_color_detail->where('product',$product)
            ->where('ordered','>',$color->ordered)->orderBy('ordered','ASC')->first();

        $currentordred=$color->ordered;
        $replaceordred=$findme->ordered;
        $findme->ordered=$currentordred;
        $findme->save();
        $color->ordered=$replaceordred;
        $color->save();
        return $color;
    }


}
