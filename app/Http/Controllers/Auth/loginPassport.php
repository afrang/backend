<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginPassport extends Controller
{
    function AuthPassport(Request $request){
        $result = filter_var($request->email, FILTER_VALIDATE_EMAIL );
        if($result!=false){
            $user= new User();
          //  $password = Hash::make($request->password);

            $user=$user->where('email',$request->email)->first();
            if (Hash::check($request->password,$user->password))
            {
              $token=$user->createToken('MyApp')->accessToken;
             return response(['data'=>[
                    'user'=>$user,
                    'token'=>$token
                    ]
            ],200);
            }
            $check=Hash::check($request->password,$user->password);
          

           // return $user;
        }
    }
}
