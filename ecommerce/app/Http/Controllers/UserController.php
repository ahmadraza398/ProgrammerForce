<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User= User::all();
        return response()->json([$User,'status'=>true, 'message'=>"All User Successfully"]);
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
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);
        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $User= User::create($input);
        return response()->json([$User,'status'=>true, 'message'=>"User has store Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User=User::find($id);
        return response()->json([$User,'status'=>true, 'message'=>"User has show Successfully"]);
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
        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $User=User::findOrFail($id);
        $User->update($input);
        return response()->json([$User,'status'=>true, 'message'=>"User Update Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User= User::find($id)->delete();
        return response()->json([$User,'status'=>true, 'message'=>"User Deleted Successfully"]);
    }
    //Register
    public function register(Request $request){
        $user = User::Create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)

        ]);
       $token = $user->createToken('Token')->accessToken;

       return response()->json([
        'token'=>$token,
        'user'=>$user
         ],200);
    }
      //Login
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:200',
            'password' => 'required',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 400);
        }
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user){
                $token = $user->createToken('Laravel Password Grant Client :')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            }
             else {
                $response = ["message" => "Password is mismatch"];
                return response($response, 422);
              }
        }
        // logout
        public function logout(Request $request)
        {
         $request->user()->token('Token')->revoke();
         return response()->json(['message'=>'logout successful']);
        }
        //forgot
        // public function forgot() {
        //     $credentials = request()->validate(['email' => 'required|email']);

        //     Password::sendResetLink($credentials);

        //     return response()->json(["msg" => 'Reset password link sent on your email id.']);
        // }

}

