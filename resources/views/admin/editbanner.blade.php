@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
   @section('con')
  
       <div class="container">
       <div class="container table-light col-10"><br>
          <div  class="row">
          <h2 class="col-7 font-weight-bold mt-4"><i class=" fa fa-edit font-weight-bold col-3 text-primary" style="font-size: 45px;"></i>
                    EDIT BANNER</h2>
                    <a href="/showbanner" class="btn btn-danger container col-3 mt-4"><i class="fa fa-reply" aria-hidden="true"></i>
                    Back</a>
            </div><br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
           <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div><br>
            @endif<br>
            <form action="/editbanner" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group">
                    <label>Caption</label>
                    <input type="text" name="caption" class="form-control container" value="{{$data->caption}}">
                    @if($errors->has('caption'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('caption')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image</label>
                     <input type="file" name="image" class="form-control">
                     <img src="{{('/uploads/'.$data->image)}}" alt="no image" height="70" width="80">
                    @if($errors->has('image'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image')}}</label>
                    @endif
                </div>
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="form-group text-center">
                    <input type="submit" name="sub" value="Update" class=" btn btn-success form-control col-4">
                </div><br>
            </form>
          </div>
        </div><br>
        @endsection 
</body>
</html>