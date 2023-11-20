<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cms;
use Symfony\Component\Console\Input\Input;

class CMSController extends Controller
{
    public function showcms()
    {
        $cms=cms::paginate(1);
        return view('admin.showcms',compact('cms'));
    }

    public function show()
    {
        $cms=cms::all();
        return $cms;
    }

    public function addcms()
    {
        return view('admin.addcms');
    }

    public function sendcms(Request $req)
    {
        
        $val=$req->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        if($val)
        {
            $file = $req->file('image');
            $dest = public_path('/uploads');
            $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
           $data=new cms();
           $data->title=$req->title;
           $data->description=$req->description;
           $data->image=$filename;
           if($data->save())
           {
            $file->move(public_path('/uploads'),$filename);
               return back()->with('error','CMS added Successfully');
           }
           else
           return back()->with('error','CMS not added');
           
        }
    }


    public function editcms($id)
    {
        $data=cms::all()->where('id',$id)->first();
        return view('admin.editcms',compact('data'));
    }




    public function updatecms(Request $req)
    {
        
        $val=$req->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        if($val)
        {
            $file = $req->file('image');
            $dest = public_path('/uploads');
            $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
            $file->move(public_path('/uploads'),$filename);
             $data=cms::where('id',$req->id)->update([
              'title'=>$req->title,
              'description'=>$req->description,
              'image'=>$filename,
           ]);
           if($data)
           {
               return back()->with('error','CMS Updated Successfully');
           }
           else
           return back()->with('error','CMS not updated');
           
        }
    }

    public function delete($id)
    {
        $del=cms::find($id)->delete();
        if($del)
        {
            return back()->with('error','Data removed !!!');
        }
        else
        return back()->with('error','Data not removed !!');
    }




    public function cmsByid($id)
    {
        $cms=cms::all()->where('id',$id);
        return $cms;
    }
}
