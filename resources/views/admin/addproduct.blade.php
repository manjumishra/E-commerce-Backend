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
          <h2 class="col-7  m-auto fa fa-plus-square font-weight-bold "style="font-size: 45px;">
                    Add Products</h2>
                    <a href="/showproduct" class="btn btn-success container col-3 "><i class="fa fa-reply" aria-hidden="true"></i>
                    Back</a>
            </div><br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
           <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
            </div><br><br>
            @endif
            <form action="sendproduct" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group"><br>
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control container" placeholder="Enter product name">
                    @if($errors->has('name'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('name')}}</label>
                    @endif
                </div>
                <div class="form-group"><br>
                    <label>Description</label>
                    <input type="text" name="description" class="form-control container" placeholder="Enter product description">
                    @if($errors->has('description'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('description')}}</label>
                    @endif
                </div>
                <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option value="">Select category</option>
                    @foreach($catdata as $r)
                   <option value="{{$r->id}}">{{$r->title}}</option>
                   @endforeach
                </select>
                @if($errors->has('category'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('category')}}</label>
                    @endif
                </div>
                <div class="form-group"><br>
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control container" placeholder="Enter product brand">
                    @if($errors->has('brand'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('brand')}}</label>
                    @endif
                </div>
                <div class="form-group"><br>
                    <label>Price</label>
                    <input type="text" name="price" class="form-control container" placeholder="Enter price">
                    @if($errors->has('price'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('price')}}</label>
                    @endif
                </div>
                <div class="form-group"><br>
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control container" placeholder="Enter quantity">
                    @if($errors->has('quantity'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('quantity')}}</label>
                    @endif
                </div>
                <div class="form-group"><br>
                    <label>Image</label>
                    <input type="file" name="image" class="form-control container">
                    @if($errors->has('image'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image')}}</label>
                    @endif
                </div>
                <br><br>
                <div class="form-group">
                    <input type="submit" name="sub" value="Submit" class=" btn btn-success form-control col-4">
                </div>
            </form>
          </div>
        </div><br><br>
   @endsection 
</body>
</html>