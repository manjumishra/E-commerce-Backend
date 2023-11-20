<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\category;

class Categorycontroller extends Controller
{
    //For category
    public function add()
    {
        return view('admin.addcategory');
    }
    

    public function showcategory()
    {
        $data=category::paginate(2);
        return view('admin.showcategory',compact('data'));
    }
     
    public function category()
    {
        $data=category::all();
        return $data;
    }



    public function sendcategory(Request $req)
    {
        $val=$req->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        if($val)
        {
           $data=new category();
           $data->title=$req->title;
           $data->description=$req->description;
           $res=$data->save();
           if($res)
           {
               return back()->with('error','Category added Successfully !!');
           }
           else
           return back()->with('error','Category not added !!');
           
        }
    }
     
    public function editcat(Request $r,$id)
    {
        
       $data=category::all()->where('id',$id)->first();
       return view('admin.editcategory',compact('data'));
    }


    // public function categoryapi($id)
    // {
        
    //    $data=category::all()->where('id',$id);
    //    return $data;
    // }

    public function editcatdata(Request $req)
    {
        $val=$req->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        if($val)
        { 
            $res=category::where('id',$req->id)->update([
             'title'=>$req->title,
             'description'=>$req->description,
           ]);
           
           if($res)
           {
               return redirect('/showcat');
           }
           else
           return back()->with('error','Category not edited');
           
        }
    }

    public function delcat($id)
    {
        $del=category::find($id)->delete();
        if($del)
        {
            return back()->with('error','Data removed !!!');
        }
        else
        return back()->with('error','Data not removed !!');
    }
    
    //For banner
    public function showbanner()
    {
        $data=banner::paginate(2);
        return view('admin.showbanner',compact('data'));
    }

    public function bannerapi()
    {
        $data=banner::all();
        return $data;
    }
   
    public function banner()
    {
        return view('admin.addbanner');
    }
    
    public function sendbanner(Request $req)
    {
        $val=$req->validate([
            'caption'=>'required',
            'image'=>'required',
        ]);
        if($val)
        {
            $file = $req->file('image');
            $dest = public_path('/uploads');
            $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
            $file->move(public_path('/uploads'),$filename);
           $data=new banner();
           $data->caption=$req->caption;
           $data->image=$filename;
           $res=$data->save();
           if($res)
           {
               return redirect('/showbanner');
           }
           else
           return back()->with('error','Banner not added');
           
        }
    }


    public function edit(Request $req,$id)
    {
        $data=banner::all()->where('id',$id)->first();
        return view('admin.editbanner',compact('data'));
    }

    
    public function editbanner(Request $req)
    {
        $val=$req->validate([
            'caption'=>'required',
            'image'=>'required',
        ]);
        if($val)
        { 
            $file = $req->file('image');
            $dest = public_path('/uploads');
            $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
            $file->move(public_path('/uploads'),$filename);
            $res=banner::where('id',$req->id)->update([
             'caption'=>$req->caption,
             'image'=>$filename,
           ]);
           
           if($res)
           {
               return back()->with('error','Banner edited Successfully');
           }
           else
           return back()->with('error','Banner not edited');
           
        }
    }



    public function delete($id)
    {
        $data=banner::find($id)->delete();
        return redirect('/showbanner');
    }

}
