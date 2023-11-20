<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\Adminregister;
use Illuminate\Support\Facades\Mail;

class JWTController extends Controller
{


    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }



    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|min:6',
            'confirm_password'=>'required|string|min:6',
        ]);
        if($validator->fails()){
            return response()->json(["msg"=>$validator->errors()]);
        }
        else {
            $user=User::create([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'confirm_password'=> Hash::make($request->confirm_password),
                 'status'=>'Active',
                'role_id'=>5,
            ]);
            Mail::to($request->email)->send(new Adminregister($request->all()));
            return response()->json([
                'message'=>'User create successfully',
                'user'=>$user,
            ]);
        }
    }


    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|string|email',
            'password'=>'required|string|min:8',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            if(!$token=auth()->guard('api')->attempt($validator->validated())){
               return response()->json(['msg'=>'Email or password not matched']);
            }
            // return $this->respondWithToken($token);
            return response()->json(['access_token' =>$token, 'email' => $request->email]); 
        }
    }
    public function logout(){
        auth()->guard('api')->logout();
        return response()->json(["msg"=>"User Logout Successfully"]);
    }
    public function respondWithToken($token){
        return response()->json([
            'message'=>'Logged in',
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->guard('api')->factory()->getTTL()*60
        ]);
    }
   
    public function refresh(){
        return $this->responseWithToken(auth()->refresh());
    }
 


    public function userProfile() {
        return response()->json(auth()->user());
    }
     

    //For change password
    public function changepassword(Request $req) {
        $input = $req->all();
        $userid = Auth::guard('api')->user()->id;
       $val=$req->validate([
        'oldpassword'=>'required',
        'password'=>'required',
        'confirm_password'=>'required'
      ]);
      if($val)
      {
        
            if ((Hash::check(request('oldpassword'), Auth::user()->password)) == false) {
                 return response()->json(['msg'=>'Check your old password']);
            } 
            else if ((Hash::check(request('password'), Auth::user()->password)) == true)
             {
             return response()->json(['msg'=>'Please enter a password which is not similar then current password']);
            }  
            else
             {
                User::where('id', $userid)->update(['password' => Hash::make($input['password'])]);
                return response()->json(['msg'=>'Password updated successfully']);
            }
        }
    }



    //For edit profile
   
  
    public function changeprofile(Request $req)
    {
        $input = $req->all();
        $userid = Auth::guard('api')->user()->id;
       $val=$req->validate([
        'firstname'=>'required',
        'email'=>'required',
        'lastname'=>'required'
      ]);
      if($val)
      {
        User::where('id', $userid)->update([
            'firstname'=>$req->firstname,
            'lastname'=>$req->lastname,
            'email'=>$req->email,
        ]);
        return response()->json(['msg'=>'profile updated successfully']);
      }
    }
}


