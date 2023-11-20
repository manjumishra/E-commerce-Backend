<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class Productcontroller extends Controller
{
    public function product()
   {
    $data=product::paginate(5);
    return view('admin.showproduct',compact('data'));

   }

   public function show()
   {
    $data=product::all();
    return $data;

   }
   //for only
   public function productdetails($id)
   {
    $data=product::all()->where('id',$id);
    return $data;

   }

   //for perticular product 
   public function productByid($id)
   {
       $data=product::all()->where('category_id',$id);
       return $data;
   }
    
   public function addproduct()
   {
       $catdata=category::all();
       return view('admin.addproduct',compact('catdata'));
   }

   public function sendproduct(Request $req)
    {
        $val=$req->validate([
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
            'brand'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'image'=>'required',
        ]);
        if($val)
        {
            $file = $req->file('image');
            $dest = public_path('/uploads');
            $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
            $file->move(public_path('/uploads'),$filename);
           $data=new product();
           $data->productname=$req->name;
           $data->description=$req->description;
           $data->category_id=$req->category;
           $data->brand=$req->brand;
           $data->price=$req->price;
           $data->quantity=$req->quantity;
           $data->image=$filename;
           $res=$data->save();
           if($res)
           {
               return back()->with('error','Product added Successfully');
           }
           else
           return back()->with('error','Product not added');
           
        }
    }

public function editproduct($id)
   {
    $catdata=category::all();
    $data=product::all()->where('id',$id)->first();
    return view('admin.editproduct',compact('data','catdata'));

   }

   public function update(Request $req)
   {
       $val=$req->validate([
           'name'=>'required',
           'description'=>'required',
           'category'=>'required',
           'brand'=>'required',
           'price'=>'required',
           'quantity'=>'required',
           'image'=>'required',
       ]);
       if($val)
       {
           $file = $req->file('image');
           $dest = public_path('/uploads');
           $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
           $file->move(public_path('/uploads'),$filename);
          $data=product::where('id',$req->id)->update([
            'productname'=>$req->name,
            'description'=>$req->description,
             'category_id'=>$req->category,
             'brand'=>$req->brand,
             'price'=>$req->price,
             'quantity'=>$req->quantity,
             'image'=>$filename,
          ]);
      
          if($data)
          {
              return back()->with('error','Product updated Successfully');
          }
          else
          return back()->with('error','Product not updated');
          
       }
   }


   public function delete($id)
   {
       $del=product::find($id)->delete();
       if($del)
       {
           return back()->with('error','Data removed !!!');
       }
       else
       return back()->with('error','Data not removed !!');
   }
}
