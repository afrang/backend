<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressShowResoure;
use App\Model\Address\user_addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(user_addresses $user_addresses)
    {
        $address=$user_addresses->where('parent',Auth::id())->with('toCity.toOstan','toCity.toShahrestan','toCity.toFreeDeliver','toCity.toFastDelivery')->get();
       // return  $address;
      return  AddressShowResoure::collection($address);
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
    public function store(Request $request,user_addresses $user_addresses)
    {
        $request->validate([
            'name'=>'required',
            'city'=>'required',
            'mobile'=>'required',
            'no'=>'required',
            'phone'=>'required',
            'postalcode'=>'required',
            'address'=>'required',
        ]);

        $save               =  new $user_addresses;
        $save->name         =  $request->name;
        $save->city         =  $request->city['id'];
        $save->address      =  $request->address;
        $save->mobile       =  $request->mobile;
        $save->no           =  $request->no;
        $save->phone        =  $request->phone;
        $save->postalcode   =  $request->postalcode;
        $save->parent    =   Auth::id();
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
    public function destroy($id)
    {
        //
    }
}
