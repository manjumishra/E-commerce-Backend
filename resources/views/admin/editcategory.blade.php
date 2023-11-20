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
                <h2 class="font-weight-bold">Edit Category</h2>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
            <form action="/editcatdata" method="post">
                @csrf()
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control container" value="{{$data->title}}">
                    @if($errors->has('title'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('title')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Description</label>
                     <input type="text" name="description" class="form-control container" value="{{$data->description}}">
                    @if($errors->has('description'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('description')}}</label>
                    @endif
                </div>
                <input type="hidden" name="id"value="{{$data->id}}">
                <div class="form-group">
                    <input type="submit" name="sub" value="Submit" class=" btn btn-primary form-control col-4">
                </div>
            </form>
          </div>
        </div><br>
   @endsection 
</body>
</html>