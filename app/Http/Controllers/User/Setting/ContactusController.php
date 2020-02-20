<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use App\Model\Sys\contactu;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(contactu $contctu)
    {
       return $contctu->get();
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
    public function update(Request $request, $id,contactu $contactu)
    {

        $save                       =$contactu->where('id',$id)->first();
        $save->facbook              =$request->facbook;
        $save->instagram            =$request->instagram;
        $save->telegram             =$request->telegram;
        $save->telegramchanal       =$request->telegramchanal;
        $save->whatsapp             =$request->whatsapp;
        $save->youtube              =$request->youtube;
        $save->aparat               =$request->aparat;
        $save->soundcloud           =$request->soundcloud;
        $save->twitter              =$request->twitter;
        $save->pinterest            =$request->pinterest;
        $save->googleplus           =$request->googleplus;
        $save->linkedin             =$request->linkedin;
        $save->phone                =$request->phone;
        $save->fax                  =$request->fax;
        $save->phones               =$request->phones;
        $save->googlemap            =$request->googlemap;
        $save->address              =$request->address;
        $save->email                =$request->email;
        $save->supportphone         =$request->supportphone;
        $save->qq                   =$request->qq;
        $save->tumblr               =$request->tumblr;
        $save->baidu                =$request->baidu;
        $save->skype                =$request->skype;
        $save->viber                =$request->viber;
        $save->sinaweibo            =$request->sinaweibo;
        $save->line                 =$request->line;
        $save->reddit               =$request->reddit;
        $save->tiktok               =$request->tiktok;
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
