<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = User::Create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
       $token = $user->createToken('Token')->accessToken;

       return response()->json([
        'token'=>$token,
        'user'=>$user
         ],200);
    }

    public function login(Request $request){
    $user = User::where(
        'email', $request->email,
        )->first();
    if($user){
        $token = $user->createToken('Token')->accessToken;
        return response()->json(['token'=>$token],200);
    }
    else{
        return response()->json(['error'=>'unauthrized data'],401);
    }
   }


//    public function logout(Request $request)
//    {
//     $request->user()->token('Token')->revoke();
//     return response()->json(['msg'=>'logout successful']);
//    }

//    public function mango(Request $req){
//     $req->user()->token('Token')->revoke();
//     return response()->json(['msg'=>'logout successful']);
//    }

}

