<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
   
    public function index()
    {
        $data=user::paginate(4);
        return view('admin.showuser',compact('data'));
    }

  
    public function create()
    {
         $roletype=role::all();
        return view('admin.adduser',compact('roletype'));
    }

  
    public function store(Request $req)
    {
        $val=$req->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'confirmpassword'=>'required|min:6',
            'status'=>'required',
            // 'role'=>'required',
           ],
        [
            // 'confirmpassword.confirmed'=>'Password not matched',
        ]);
           if($val)
           {
               $data=new User();
               $data->firstname=$req->firstname;
               $data->lastname=$req->lastname;
               $data->email=$req->email;
               $data->password=Hash::make($req->password);
               $data->confirm_password=Hash::make($req->confirmpassword);
               $data->status=$req->status;
               $data->role_id=$req->role;
               if($data->save())
               {
                   return back()->with('error','User added Successfully');
               }
               else
               return back()->with('error','User not added ');
              
            
           }
    }


   
    public function edit($id)
    {
        $roletype=role::orderBy('id','DESC')->get();
        $udata=User::all()->where('id',$id)->first();
        return view('admin.edituser',compact('roletype','udata'));
    }

   
    public function updateuser(Request $req)
    {
        $val=$req->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'status'=>'required',
           ]);
           if($val)
           {
               $data=User::where('id',$req->id)->update([
                'firstname'=>$req->firstname,
                'lastname'=>$req->lastname,
                'email'=>$req->email,
                'role_id'=>$req->role,
                'status'=>$req->status,
               ]);
              //return $req->input();
               if($data)
               {
                   return back()->with('error','User Updated Successfully');
               }
               else
               return back()->with('error','User not Updated ');
            
           }
    }

   
    public function destroy($id)
    {
        // $del=User::find($id)->delete();
        $del=User::destroy($id);

        if($del)
        {
            return back()->with('error','Data removed !!!');
        }
        else
        return back()->with('error','Data not removed !!');
    }


 
}
