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
                <h2 class="col-8 mt-4 fa fa-question-circle font-weight-bold text-success "style="font-size: 40px;">
                    Customer Queries</h2>
            </div>
            <br>
            <table class="table mt-4">
                <tr class="col"> 
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th >Contact Number</th>
                    <th>Message</th>
                   
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->name}}</td>
                    <td>{{$q->email}}</td>
                    <td>{{$q->phonenumber}}</td>
                    <td>{{$q->message}}</td>
                </tr> 
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