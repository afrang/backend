<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,User $users)
    {

            return $users->with('toroll')->paginate(10);
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
    public function store(Request $request,User $user)
    {

        $request->validate([
                'name'=>'required',
                'lastname'=>'required',
                'mobile'=>'required|unique:users,mobile',
                'email'=>'required|unique:users,email',
                'password' => 'required|confirmed|min:8',
                ]);
           $save                            =new $user;
           $save->name                      =$request->name;
           $save->email                     =$request->email;
           $save->mobile                    =$request->mobile;
           $save->confrimmobile             =1;
           $save->confrimcode               ='';
           $save->natioanlcode              =$request->natioanlcode;
           $save->lastname                  =$request->lastname;
           $save->city                      =@$request->city['name'];
           $save->state                      =@$request->state['name'];
           $save->phone                     =$request->phone;
           $save->fax                       =$request->fax;
           $save->address                   =$request->address;
           $save->birthday                  =$request->birthday;
           $save->roll                      =$request->roll['id'];
           $save->gender                    =$request->gender;
           $save->password                  =Hash::make($request->password);
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,User $user)
    {
       return $request->all();

        $save           =$user->find($id);
        if($request->password==null){
            $request->validate([
                'name'=>'required',
                'lastname'=>'required',
                'mobile'=>['required',
                Rule::unique('users','mobile')->ignore($id),
                ],
                'email'=> [
                    'required',
                    Rule::unique('users','email')->ignore($id),
                ],

                ]);
        }else{
            $request->validate([
                'name'=>'required',
                'lastname'=>'required',
                'mobile'=>['required',
                Rule::unique('users','mobile')->ignore($id),
                ],
                'email'=> [
                    'required',
                    Rule::unique('users','email')->ignore($id),
                ],
                'password' => 'required|confirmed|min:8'
                ]);

                $save->password                  =Hash::make($request->password);

        }
        $save->name                      =$request->name;
        $save->email                     =$request->email;
        $save->mobile                    =$request->mobile;
        $save->confrimmobile             =1;
        $save->confrimcode               ='';
        $save->natioanlcode              =$request->natioanlcode;
        $save->lastname                  =$request->lastname;
        $save->city                      =@$request->city['name'];
        $save->state                      =@$request->state['name'];
        $save->phone                     =$request->phone;
        $save->fax                       =$request->fax;
        $save->address                   =$request->address;
        $save->birthday                  =$request->birthday;
        $save->roll                      =$request->roll['id'];
        $save->gender                    =$request->gender;
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
