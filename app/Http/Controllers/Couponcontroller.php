<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Couponcontroller extends Controller
{
    public function coupon()
    {
        return view('admin.addcoupon');
    }
    public function showcoupon()
    {
        $data=coupon::paginate(2);
        return view('admin.showcoupon',compact('data'));
    }

    public function sendcoupon(Request $req)
    {
        $val=$req->validate([
            'coupon_code'=>'required|unique:coupons',
            'quantity'=>'required',
            'value'=>'required',
        ]);
        if($val)
        {
           $data=new coupon();
           $data->coupon_code=$req->coupon_code;
           $data->quantity=$req->quantity;
           $data->coupon_value=$req->value;
           $res=$data->save();
           if($res)
           {
               return back()->with('error','Coupon added Successfully');
           }
           else
           return back()->with('error','Coupon not added');
           
        }
    }


    public function edit($id)
    {
        $data=coupon::all()->where('id',$id)->first();
        return view('admin.editcoupon',compact('data'));
    }

    public function updatecoupon(Request $req)
    {

        $val=$req->validate([
            'coupon_code'=>'required',
            'quantity'=>'required',
            'value'=>'required',
        ]);
        if($val)
        { 
            $res=coupon::where('id',$req->id)->update([
                'coupon_code'=>$req->coupon_code,
                'quantity'=>$req->quantity,
                'coupon_value'=>$req->value
           ]);
          // return $req->input();
           if($res)
           {
              return back()->with('error','Coupon edited Successfully');
           }
           else
           return back()->with('error','Coupon not edited');
           
        }
    }



    public function delete($id)
    {
        $data = coupon::find($id)->delete();
        return redirect('/showcoupon');

    }


    // For api 
    public function getcoupon()
    {
        $data=coupon::all();
        return $data;
    }

    
    public function applycoupon(Request $req)
    {
        $coupon=coupon::where('coupon_code',$req->coupon_code)->first();
        if(!$coupon)
        {
            return response()->json(['msg'=>'Invalid Coupon code']);
            
        }
        else{
            DB::select("call Discount(".$coupon->id.")");
        return response()->json(['msg'=>'Coupon Applied successfully',"coupon_value"=>$coupon->coupon_value,"coupon_code"=>$coupon->coupon_code]); 
        }
      
    }
}
