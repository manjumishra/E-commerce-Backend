@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    @section('con')

    <div class="container">
        <div class="container table-light">

            <div class="row">
                <h2 class="col-4 mt-4"><i class=" fa fa-gift font-weight-bold col-3 " style="font-size: 40px;"></i>
                    Coupons</h2>
                <a href="/addcoupon" class="btn btn-success container col-3 mt-4">Add Coupons</a>
            </div>
            <table class="table mt-4" border=2>
                <tr class="">
                    <th>S.no</th>
                    <th>Coupon Code</th>
                    <th>Quantity</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->coupon_code}}</td>
                    <td>{{$q->quantity}}</td>
                    <td>{{$q->coupon_value}}</td>
                    <td>
                        <a href="/editcoupon/{{$q->id}}" class="btn btn-secondary">Edit</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                            Delete
                        </button>
                        <!-- <a href="/delcoupon/{{$q->id}}" class="btn btn-success col-6">Delete</a> -->
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
                                <a href="/delcoupon/{{$q->id}}" class="btn btn-success col-3">
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