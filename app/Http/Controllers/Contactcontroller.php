<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\contact;
use Illuminate\Support\Facades\Hash;
use App\Mail\Contactmail;
use Illuminate\Support\Facades\Mail;

class Contactcontroller extends Controller
{
    public function index()
    {
        $data=contact::paginate(2);
       return view('admin.showcontacts',compact('data')); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phonenumber'=>'required',
            'message'=>'required',
           
        ]);
        if($validator->fails()){
            return response()->json(["msg"=>$validator->errors()]);
        }
        else {
            $user=contact::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phonenumber'=>$request->phonenumber,
                'message'=>$request->message,
               
            ]);
            Mail::to($request->email)->send(new Contactmail($request->all()));
            return response()->json([
                'message'=>'Data sent successfully!!',
                'user'=>$user
            ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
