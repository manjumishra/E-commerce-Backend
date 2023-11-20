@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
   @section('con')
   <div class="container">
          <div class="jumbotron col-10 container">
          <div  class="row">
          <h2 class="col-7 mt-4 m-auto"><i class=" fa fa-edit font-weight-bold text-success  col-3 " style="font-size: 45px;"></i>
                    Edit Email</h2>
                    <a href="/showconfig" class="btn btn-success container col-3 mt-4"><i class="fa fa-reply" aria-hidden="true"></i>
                    Back</a>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
           <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
            </div>
            @endif
            <form action="/editconfig" method="post">
                @csrf()
                <div class="form-group"><br>
                    <label>Title</label>
                    <input type="text" name="title" class="form-control container" value="{{$data->title}}">
                    @if($errors->has('title'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('title')}}</label>
                    @endif
                </div>
                <div class="form-group"><br>
                    <label>Email</label>
                    <input type="text" name="email" class="form-control container" value="{{$data->email}}">
                    @if($errors->has('email'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('email')}}</label>
                    @endif
                </div><br><br>
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="form-group">
                    <input type="submit" name="sub" value="Update" class=" btn btn-success form-control col-4">
                </div>
            </form>
          </div>
        </div>
   @endsection 
</body>
</html>