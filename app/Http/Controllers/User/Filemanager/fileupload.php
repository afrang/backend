<?php

namespace App\Http\Controllers\User\Filemanager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class fileupload extends Controller
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
       if($request->name=='random'){
           $request->name=substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 20)), 0, 20);

       }
        $rand=rand(1000,9999);
         Storage::disk('media')->makeDirectory($request->mode);
        Storage::disk('media')->makeDirectory($request->mode.'/'.$request->id);
        Storage::disk('media')->makeDirectory($request->mode.'/'.$request->id.'/orginal');
        Storage::disk('media')->makeDirectory($request->mode.'/'.$request->id.'/thump');
        Storage::disk('media')->makeDirectory($request->mode.'/'.$request->id.'/medium');
        $fileName = $request->name.'.'.$request->file->extension();
        $manager = new ImageManager();
        $manager->make($request->file)->resize(300,null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path().'/media/'.$request->mode.'/'.$request->id.'/thump/'.$fileName);
        $manager->make($request->file)->resize(600,null, function ($constraint) {
        $constraint->aspectRatio();
    })->save(public_path().'/media/'.$request->mode.'/'.$request->id.'/medium/'.$fileName);
        $manager->make($request->file)->save(public_path().'/media/'.$request->mode.'/'.$request->id.'/orginal/'.$fileName);

        return  $fileName.'?='.$rand;

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
    public function destroy($id,Request $request)
    {
        $myfile=explode('?',$request->file);

        Storage::disk('media')->delete($request->mode.'/'.$request->id.'/medium/'.$myfile[0]);
        Storage::disk('media')->delete($request->mode.'/'.$request->id.'/thump/'.$myfile[0]);
        Storage::disk('media')->delete($request->mode.'/'.$request->id.'/orginal/'.$myfile[0]);
        return  $request->all();
    }
}
