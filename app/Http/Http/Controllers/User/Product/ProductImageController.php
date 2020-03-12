<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use App\Model\Product\p_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,p_image $image)
    {
        return  $image->where('parent',$request->id)->get();
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
    public function store(Request $request,p_image $image)
    {
       $count=$image->where('parent',$request->product)->count();
      $image =  new $image;
      $image->parent=$request->product;
      $image->file=$request->image;
      $image->show=1;
        if($count==0){
            $image->master=1;
        }
        $image->save();


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
    public function update($id,p_image $image)
    {
        $find=$image->find($id);

        $prant=$find->parent;

        $image->where('parent',$prant)->update(['master'=>0]);
        $image->where('id',$id)->update(['master'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,p_image $image)
    {
        $img=$image->where('id',$id)->first();
        $myfile=explode('?',$img->file);

        if($img->master=='1'){

            $findother=$image->where('parent',$img->parent)->where('id','!=',$id)->first();

            if($findother!=null){

                $findother->master=1;
              $findother->save();
            }
        }

        Storage::disk('media')->delete('/Product/'.$img->parent.'/medium/'.$myfile[0]);
        Storage::disk('media')->delete('/Product/'.$img->parent.'/orginal/'.$myfile[0]);
        Storage::disk('media')->delete('/Product/'.$img->parent.'/thump/'.$myfile[0]);
        $img->delete();
    }
}
