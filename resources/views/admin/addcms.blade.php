@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
   @section('con')
  
       <div class="container">
          <div class="table-light mt-4 col-10 container border">
          <div class="row">
                <h2 class="font-weight-bold mt-4 col-7">ADD CMS</h2>
                <a href="/showcms" class="btn btn-success container mt-4 col-3"><i class="fa fa-reply" aria-hidden="true"></i>
                    Back</a>
            </div><br><br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div><br>
            @endif
            <form action="sendcms" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control container" placeholder="write cms name">
                    @if($errors->has('title'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('title')}}</label>
                    @endif
                </div>
                <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="write description here"></textarea>
                @if($errors->has('description'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('description')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image</label>
                     <input type="file" name="image" class="form-control">
                    @if($errors->has('image'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image')}}</label>
                    @endif
                </div><br>
                <div class="form-group container">
                    <input type="submit" name="sub" value="Submit" class=" btn btn-success form-control col-4">
                </div><br>
            </form>
          </div>
        </div><br>
   @endsection 
</body>
</html>