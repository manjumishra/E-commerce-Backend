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
          <div align=center>
                <h2 class="font-weight-bold">ADD BANNER</h2>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
            <form action="sendbanner" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group">
                    <label>Caption</label>
                    <input type="text" name="caption" class="form-control container" placeholder="write captions here">
                    @if($errors->has('caption'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('caption')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image</label>
                     <input type="file" name="image" class="form-control">
                    @if($errors->has('image'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image')}}</label>
                    @endif
                </div>
                <div class="form-group container">
                    <input type="submit" name="sub" value="Submit" class=" btn btn-success form-control col-4">
                </div><br><br>
            </form>
          </div>
        </div><br>
   @endsection 
</body>
</html>