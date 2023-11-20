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
                <h2 class="col-7 mt-4 fa fa-th text-danger font-weight-bold" style="font-size: 40px;">
                    Products</h2>
                <a href="/addproduct" class="btn btn-success container col-2 mt-4">
                <i class=" fa fa-plus font-weight-bold text-light"></i>    
                &emsp;Add 
              </a>
            </div>
            <br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
           <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
            </div>
            @endif
            <br>
            <table class="table mt-4">
                <thead>
                <tr class="">
                    <th>S.no</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                     <td>{{$q->productname}}</td>
                     <td>{{$q->description}}</td>
                     <td>{{$q->category_id}}</td>
                     <td>{{$q->brand}}</td>
                     <td>{{$q->price}}</td>
                     <td>{{$q->quantity}}</td>
                     <td>
                     <img src="{{('/uploads/'.$q->image)}}" alt="no image" height="40" weight="40">
                     </td>
                    <td>
                        <a href="/editproduct/{{$q->id}}" class="fa fa-edit text-warning "style="font-size:30px;"></a>
                        <!-- <a href="/delproduct/{{$q->id}}" class="fa fa-trash"style="font-size:30px;"></a> -->

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-trash"></i>
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
                            <a href="/delproduct/{{$q->id}}" class="btn btn-success col-3">
                                Yes</a>

                                @endforeach
                    </tbody>
            </table><br>
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>


        </div>
    </div>
    @endsection
</body>

</html>