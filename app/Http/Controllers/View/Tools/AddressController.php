<?php

namespace App\Http\Controllers\View\Tools;

use App\Http\Controllers\Controller;
use App\Model\Address\address_delivery_citie;
use App\Model\Address\address_ostan;
use App\Model\Address\address_shahr;
use App\Model\Address\address_shahrestan;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    function getstate(){
        return address_ostan::get();
    }
    function countylist(Request $request,address_shahrestan $address_shahrestan){

        return $address_shahrestan->where('ostan',$request->id)->get();
    }
    function citylist(Request $request,address_shahr $address_shahr){
        return $address_shahr->where('shahrestan',$request->id)->get();

    }
    function savedelivery(Request $request,address_delivery_citie $address_delivery_citie){

    }
}
