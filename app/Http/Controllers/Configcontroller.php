<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\configuration;

class Configcontroller extends Controller
{
    public function config()
    {
        return view('admin.addconfig');
    }
    public function showconfig()
    {
        $data=configuration::paginate(2);
        return view('admin.showconfig',compact('data'));
    }

    public function senddata(Request $req)
    {
        $val=$req->validate([
         'email'=>'required|email|unique:configurations',
         'title'=>'required',
        ]);
        if($val)
        {
            $data=new configuration();
            $data->email=$req->email;
            $data->title=$req->title;
            if($data->save())
            {
                return back()->with('error','Data added Successfully');
            }
            else
            return back()->with('error','Data not added ');
        }
    }


    public function edit(Request $req,$id)
    {
        $data=configuration::all()->where('id',$id)->first();
        return view('admin.editconfig',compact('data'));
    }

    public function editconfig(Request $req)
    {
        $val=$req->validate([
         'email'=>'required|email',
         'title'=>'required',
        ]);
        if($val)
        {
           $data=configuration::where('id',$req->id)->update([
              'email'=>$req->email,
              'title'=>$req->title,
           ]);
            if($data)
            {
                return back()->with('error','updated Successfully');
            }
            else
            return back()->with('error','Data not updated ');
        }
    }


    public function delete($id)
    {
        $del=configuration::find($id)->delete();
        if($del)
        {
            return back()->with('error','Email removed !!!');
        }
        else
        return back()->with('error','Email not removed !!');
    }
}
