@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    @section('con')

    <div class="container">
        <div class="container table-light border">
            <div class="row">
                <h2 class="col-7 mt-4 fa fa-th-large text-success font-weight-bold" style="font-size: 40px;">
                    Categories</h2>
            </div>
            <br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
            </div>
            @endif
            <br>

            <table class="table mt-4">
                <tr>
                    <th>S.no</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->title}}</td>
                    <td>{{$q->description}}</td>
                    <td>
                        <a href="/editcategory/{{$q->id}}" class="btn btn-primary">Edit</a>
                        <!-- <a href="/delcat/{{$q->id}}" class="btn btn-success">
                                    Delete</a> -->

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                            Delete
                        </button>
                    </td>
                </tr>


                <!-- For Delete Pop_up -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-light" align=center>
                                <h4><i class=" fa fa-exclamation-circle"></i></h4>
                                <h6>Are you sure you want ot delete !!??</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger col-3" data-dismiss="modal">No</button>
                                <a href="/delcat/{{$q->id}}" class="btn btn-success col-3">
                                    Yes</a>

                                @endforeach
            </table><br>
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
    @endsection
</body>

</html>