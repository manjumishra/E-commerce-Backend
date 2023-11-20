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
                <h2 class="col-8 mt-4 fa fa-shopping-cart text-success font-weight-bold  "style="font-size: 40px;">
                   User Order Details</h2>
            </div>
            <br>
            <table class="table mt-4">
                <tr class="col"> 
                    <th>S.no</th>
                    <th>Email</th>
                    <th >Product Id</th>
                    <th >Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($product as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->useremail}}</td>
                    <td>{{$q->product_id}}</td>
                    <td>{{$q->productname}}</td>
                    <td>{{$q->quantity}}</td>
                    <td>{{$q->price}}</td>
                    <td>{{$q->total}}</td>
                    <td>{{$q->payment_mode}}</td>
                    <td>{{$q->status}}</td>
                    <td>
                    <a href="/editorderstatus/{{$q->id}}" class="fa fa-edit btn-success btn"> Edit Status</a>
                    </td>
                </tr> 
                @endforeach
            </table><br>
            <div class="d-flex justify-content-center">
                {!! $product->links() !!}
            </div>
        </div>
    </div>
    @endsection
</body>

</html>