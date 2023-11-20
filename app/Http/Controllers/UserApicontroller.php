<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wishlist;
use App\Models\user_detail;
use App\Models\user_order_detail;
use App\Mail\ordermail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class UserApicontroller extends Controller
{
    public function addwishlist(Request $req)
    {
        $val=$req->validate([
           'useremail'=>'required|email',
           'productname'=>'required',
           'price'=>'required',
           'quantity'=>'required',
        //    'image'=>'required'
          
        ]);
        if($val)
        {
            
           $data=new wishlist();
           $data->useremail=$req->useremail;
           $data->productname=$req->productname;
           $data->price=$req->price;
           $data->quantity=$req->quantity;
           $data->image=$req->image;
           $res=$data->save();
           if($res)
           {
               return back()->with('msg','Wishlist added Successfully');
           }
           else
           return back()->with('msg','Wishlist not added');
           
        }
    }


    public function adduserdetails(Request $req)
    {
           $val=$req->validate([
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'required|email',
                'phonenumber'=>'required',
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'pincode'=>'required',
             
            ]);
            if($val)
            {
                $data=new user_detail();
                $data->firstname=$req->firstname;
                $data->lastname=$req->lastname;
                $data->email=$req->email;
                $data->phonenumber=$req->phonenumber;
                $data->address=$req->address;
                $data->city=$req->city;
                $data->state=$req->state;
                $data->pincode=$req->pincode;
                $res=$data->save();
                if($res)
                {
                    return response()->json(['msg','User details added Successfully']);
                }
                else
                return response()->json('msg','User details not added ');
            }
    }

    public function adduserorder(Request $req)
    {
           $val=$req->validate([
                'useremail'=>'required|email',
                'product_id'=>'required',
                'price'=>'required',
                'quantity'=>'required',
                'total'=>'required',
                'productname'=>'required',
                //  'usedcoupon'=>'required',
                'payment_mode'=>'required',
             
            ]);
            if($val)
            {
                $tracking_id="Eshop".rand(1111,9999);
                $data=new user_order_detail();
                $data->useremail=$req->useremail;
                $data->product_id=$req->product_id;
                $data->price=$req->price;
                $data->quantity=$req->quantity;
                $data->productname=$req->productname;
                $data->total=$req->total;
                $data->usedcoupon=$req->usedcoupon;
                $data->payment_mode=$req->payment_mode;
                $data->status="order placed";
                $data->tracking_id=$tracking_id;
                $res=$data->save();
                 Mail::to($req->email)->send(new ordermail($req->all()));
                if($res)
                {
                    return response()->json(['msg','User details added Successfully']);
                }
                else
                return response()->json('msg','User details not added ');
            }
    }

    public function userdetails()
    {
        $data=user_detail::paginate(2);
        return view('admin.showuserdetails',compact('data'));
    }

    public function orderdetails()
    {
        $product=user_order_detail::paginate(4);
        return view('admin.showorderdetails',compact('product'));
    }

    //For edit Order status

    public function editorderstatus($id)
    {
        $data=user_order_detail::where('id',$id)->get()->first();
        return view('admin.editOrderstatus',compact('data'));
    }

    //For Update order status
    public function updatestatus(Request $req)
    {
        
        $val=$req->validate([
            'status'=>'required',
        ]);
        if($val)
        {
           
             $data=user_order_detail::where('id',$req->id)->update([
              'status'=>$req->status,
           ]);
           if($data)
           {
               return back()->with('error','Status Updated Successfully');
           }
           else
           return back()->with('error','Status not updated');
           
        }
    }

    public function index()
    {
        $result = DB::select(DB::raw("select count(*)as total,role_id from users where role_id=5 group by role_id"));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->role_id . "',     " . $list->total . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");
        return view('admin.reports', $arr);
    }



    //This is used to show used coupon report
    public function couponchart()
    {
        $result = DB::select(DB::raw("select count(*)as total,usedcoupon from user_order_details  group by usedcoupon"));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->usedcoupon . "',     " . $list->total . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");
        return view('admin.couponreport', $arr);
    }


    //For shows sales report
    public function saleschart()
    {
        $result = DB::select(DB::raw("select productname, count(*)as total from user_order_details group by productname"));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->productname . "',      " . $list->total . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");
        return view('admin.salereport', $arr);
    }
 



    
    public function search($id,$email)
    { 
        $val=user_order_detail::where(['tracking_id'=>$id,'useremail'=>$email])->get();
        if($val)
        {
          return $val;
        }
        return back()->with('msg',"No data found");
    }
   
   
}
