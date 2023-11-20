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
                <h2 class="font-weight-bold mt-4 col-7">Update Status</h2>
                <a href="/orders" class="btn btn-success container mt-4 col-3"><i class="fa fa-reply" aria-hidden="true"></i>
                    Back</a>
            </div><br><br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div><br>
            @endif
            <form action="/updatestatus" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" class="form-control container" value="{{$data->status}}">
                    @if($errors->has('status'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('status')}}</label>
                    @endif
                </div>
                <br>
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="form-group container">
                    <input type="submit" name="sub" value="Update" class=" btn btn-success form-control col-4">
                </div><br>
            </form>
        </div>
    </div><br>
    @endsection
</body>

</html>