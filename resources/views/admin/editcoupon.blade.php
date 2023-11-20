@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
   @section('con')
  
       <div class="container">
          <div class="table-light border border-dark col-10 jumbtron container">
                <div class=" row">
                <h2 class=" font-weight-bold mt-4 col-6" >Edit Coupon</h2>
                <a href="/showcoupon" class="btn btn-dark text-light font-weight-bold ml-4 col-4 mt-4">Show coupons</a><br>
                </div><br>
            @if(Session::has('error'))
         <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div> 
            @endif<br>
            <form action="/updatecoupon" method="post">
                @csrf()
                <div class="form-group">
                    <label>Coupon Code</label>
                    <input type="text" name="coupon_code" class="form-control container" value="{{$data->coupon_code}}">
                    @if($errors->has('coupon_code'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('coupon_code')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control container" value="{{$data->quantity}}">
                    @if($errors->has('quantity'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('quantity')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Value</label>
                    <input type="text" name="value" class="form-control container" value="{{$data->coupon_value}}">
                    @if($errors->has('value'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('value')}}</label>
                    @endif
                </div>
                <input type="hidden"name="id" value="{{$data->id}}">
                <div class="form-group" align=center>
                    <input type="submit" name="sub" value="Update" class=" btn btn-success form-control h3 col-5">
                </div>
            </form>
          </div>
        </div><br>
   @endsection 
</body>
</html>