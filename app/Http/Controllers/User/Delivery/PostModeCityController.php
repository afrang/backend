<?php

namespace App\Http\Controllers\User\Delivery;

use App\Http\Controllers\Controller;
use App\Model\Address\address_delivery_citie;
use Illuminate\Http\Request;

class PostModeCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(address_delivery_citie $address_delivery_citie)
    {
        return  $address_delivery_citie->with('toCity.toOstan','toCity.toShahrestan')->get();
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
    public function store(Request $request,address_delivery_citie $address_delivery_citie)
    {
        $save               = new $address_delivery_citie;
        $save->city         = $request->city['id'];
         $save->free        = $request->free;
         $save->fastsending = $request->fastsending;
        $save->save();
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
    public function destroy($id,address_delivery_citie $address_delivery_citie)
    {
      $address_delivery_citie->where('id',$id)->delete();
    }
}
