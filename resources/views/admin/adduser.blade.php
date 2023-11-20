@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
   @section('con')
  
       <div class="container">
          <div class="table-light border col-10 jumbtron container">
                <div class=" row">
                <h2 class=" font-weight-bold mt-4 col-6" >Add User</h2>
                <a href="/showuser" class="btn btn-success text-light font-weight-bold ml-4 col-4 mt-4">Back</a><br>
                </div><br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif<br>
            <form action="senduser" method="post">
                @csrf()
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="firstname" class="form-control container" placeholder="enter your first name only">
                    @if($errors->has('firstname'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('firstname')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="form-control container" placeholder="enter your last name">
                    @if($errors->has('lastname'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('lastname')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control container" placeholder="enter your email">
                    @if($errors->has('email'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('email')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control container" placeholder="enter password">
                    @if($errors->has('password'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('password')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control container" placeholder="re-enter your password">
                    @if($errors->has('confirmpassword'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('confirmpassword')}}</label>
                    @endif
                </div>
                <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="5">Select role</option>
                    @foreach($roletype as $r)
                   <option value="{{$r->id}}">{{$r->rolename}}</option>
                   @endforeach
                </select>
                @if($errors->has('role'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('role')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="active"class="ml-2">&ensp;Active
                    <input type="radio" name="status"value="Inactive"class="ml-2">&ensp;Inactive
                    @if($errors->has('status'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('status')}}</label>
                    @endif
                </div>
                <div class="form-group" align=center>
                    <input type="submit" name="sub" value="ADD" class=" btn btn-success form-control h3 col-5">
                </div>
            </form>
          </div>
        </div><br>
   @endsection 
</body>
</html>