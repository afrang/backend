<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\SendSmsController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required',  'regex:/(09)[0-9]{9}/','digits:11','numeric', 'unique:Users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $code=mt_rand(100000, 999999);
        $createcode=Hash::make($code);
        $msg=trans('website.wellcometoBoomcoyouractivecodeis').$code.trans('website.addresswebsite');
          SendSmsController::sendingsms($data['phone'],$msg);

        return User::create([
            'phone' => $data['phone'],
            'confrimcode' => $createcode,
            'password' => Hash::make($data['password']),
        ]);

    }
}
