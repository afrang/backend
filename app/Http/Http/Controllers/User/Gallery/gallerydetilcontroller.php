<?php

namespace App\Http\Controllers\User\Gallery;

use App\Http\Controllers\Controller;
use App\Model\Gallery\g_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class gallerydetilcontroller extends Controller
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
    public function store(Request $request,g_detail $detail)
    {
        $detail
        ->where('parent',$request->parent)
        ->whereNull('file')
        ->delete();
        $findmax=$detail->where('parent',$request->parent)->max('orders')+1;
        $save           =new $detail;
        $save->orders   =$findmax;
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
    public function update(Request $request, $id,g_detail $detail)
    {
        $save               =$detail->find($id) ;
        $save->text         =$request->text;
        $save->name         =$request->name;
        $save->file         =$request->file;
        $save->publish     =$request->publish;
        $save->text         =$request->text;
        $save->save();
        return  $save;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,g_detail $detail)
    {
        Storage::disk('media')->deleteDirectory('gallery/'.$id);
        $detail->where('id',$id)->delete();
    }
    function up($id,g_detail $detail){
        $current=$detail->find($id);
        $max=$current->where('parent',$current->parent)->first()->min('orders');
        if($current->orders==$max){
            return 'Is up to list';
        }

        //$boeforitem=$current->ordred-1;
        $findme=$detail->where('parent',$current->parent)
            ->where('orders','<',$current->orders)->orderBy('orders','DESC')->first();
        $currentordred=$current->orders;
        $replaceordred=$findme->orders;
        $findme->orders=$currentordred;
        $findme->save();
        $current->orders=$replaceordred;
        $current->save();
    }
    function down($id,g_detail $detail){
        $current=$detail->find($id);
        $max=$detail->where('parent',$current->parent)->first()->max('orders');
        if($current->orders==$max){
            return 'Is up to list';
        }
        //$boeforitem=$current->ordred-1;
        $findme=$detail->where('parent',$current->parent)
            ->where('orders','>',$current->orders)->orderby('orders','ASC')->first();

        $currentordred=$current->orders;
        $replaceordred=$findme->orders;
        $findme->orders=$currentordred;
        $findme->save();
        $current->orders=$replaceordred;
        $current->save();
    }
}
