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
          <h2 class="col-7 mt-4 m-auto"><i class=" fa fa-plus-square font-weight-bold text-success  col-3 " style="font-size: 45px;"></i>
                    Add Category</h2>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}</div>
            @endif
            <form action="sendcategory" method="post">
                @csrf()
                <div class="form-group"><br>
                    <label>Title</label>
                    <input type="text" name="title" class="form-control container" placeholder="enter title">
                    @if($errors->has('title'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('title')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Description</label>
                     <input type="text" name="description" class="form-control container" placeholder="enter description" >
                    @if($errors->has('description'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('description')}}</label>
                    @endif
                </div><br>
                <div class="form-group">
                    <input type="submit" name="sub" value="Submit" class=" btn btn-primary form-control col-4">
                </div>
            </form>
          </div>
        </div>
   @endsection 
</body>
</html>