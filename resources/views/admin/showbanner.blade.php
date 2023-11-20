@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @section('con')

    <div class="container">
        <div class="container table-light">
            <div class="row">
                <h2 class="col-4 mt-4"><i class=" fa fa-file-image font-weight-bold col-3 " style="font-size: 40px;"></i>
                    Banners</h2>
                <a href="/addbanner" class="btn btn-success  col-3 container mt-4">Add Banner</a>
            </div>
            <table class="table mt-4" border=2>
                <tr class="">
                    <th>S.no</th>
                    <th>Caption</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn}}</td>
                    <td>{{$q->caption}}</td>
                    <td>
                        <img src="{{('/uploads/'.$q->image)}}" alt="no image" height="40" weight="40">
                    </td>
                    <td>
                        <a href="/editb/{{$q->id}}" class="btn btn-primary text-light">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                            Delete
                        </button>
                        <!-- <a href="/delbanner/{{$q->id}}" class="btn btn-danger">Delete</a> -->
                    </td>
                </tr>

                @php
                $sn++;
                @endphp

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
                                <a href="/delbanner/{{$q->id}}" class="btn btn-success col-3">
                                    Yes</a>

                                @endforeach

            </table><br><br>

            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>

        </div>
    </div>
    @endsection
</body>

</html>