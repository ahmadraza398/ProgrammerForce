<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\hellomail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

// USER CRUD AND LOGIN,REGISTER,LOGOUT,FORGETPASSWORD,REST PASSWORD
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
    //.>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    //REGISTER  USERS
    public function register(Request $request){
        $user = User::Create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,

        ]);
        if($user){
            Mail::to($user->email)->send(new hellomail($user));
        }
       $token = $user->createToken('Token')->accessToken;

       return response()->json([
        'token'=>$token,
        'user'=>$user
         ],200);

    }
      //LOGIN PASSWORD USERS
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
        // LOGOUT PASSWORD USERS
        public function logout(Request $request)
        {
         $request->user()->token('Token')->revoke();
         return response()->json(['message'=>'logout successful']);
        }
        // FORGET PASSWORD USERS
        public function forgetpassword(Request $request)
        {
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);
            $token = Str::random(50);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]);
            Mail::to($request->email)->send(new ForgetPasswordMail($token));
            return response([
                'message' => 'Please Check Your Email For Reset Your Password',
            ], 200);
        }

    // RESET PASSWORD FOR FORGET PASSWORD USERS
    public function resetForgetPassword(Request $request, $token)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $token])->first();
        if (!$updatePassword) {
            return redirect()->route('login');
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where('email', $request->email)->where('token', $token)->delete();
        return response([
            'message' => 'Your Password reset Successfully !',
        ], 200);
    }

        // verify email simple mail method
        public function verify($id){
            $user = User::findorFail($id);
                    $user->email_verified_at = now();
                    $user->save();
                    return response()->json(["msg" => 'Email is verified.']);
        }
}

