@extends('layouts.company')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>

    </li>
    <li class="breadcrumb-item">
        <a href="#">view Cv</a>
    </li>
    <li class="breadcrumb-item active">
    Interview Details
    </li>


</ol>
<div class="container">


    <form action="{{url('/company/viewCv/call')}}" method="post" >
        {{csrf_field()}}
        <div class="form-group col-md-8">

            <label for="exampleInputName">University Registration No</label>
            <input class="form-control" value="{{$a[0]}}" id="registration_no" name="registration_no" type="text" aria-describedby="nameHelp"  required readonly>


        </div>
        <div class="form-group col-md-8">
            <label for="exampleInputEmail1">Name with Initials</label>
            <input class="form-control"  value="{{$a[1]}}" id="nameWithInit" name="nameWithInit"  type="text" aria-describedby="nameHelp" required readonly>
        </div>



            <input class="form-control" value="{{$a[2]}}" id="address" name="companyId" type="text" aria-describedby="nameHelp" placeholder="Enter Address" required hidden >
            <input class="form-control" id="contactNo" value="{{$a[3]}}" name="requirementId" type="text" aria-describedby="nameHelp" placeholder="Enter Contact No" required hidden>
            <input class="form-control" id="contactNo" value="{{$a[4]}}" name="requirement" type="text" aria-describedby="nameHelp" placeholder="Enter Contact No" required hidden>
             <input class="form-control" id="contactNo" value="{{$a[6]}}" name="year" type="text" aria-describedby="nameHelp" placeholder="Enter Contact No" required hidden>


        <div class="form-group col-md-8">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="email"  value="{{$a[5]}}" name="email" type="text" aria-describedby="nameHelp" placeholder="Enter Username" required>
        </div>
        <div class="form-group col-md-8">
            <label for="exampleInputEmail1">Interview Time</label>
            <input class="form-control" id="timestamp"   name="timestamp" type="datetime-local" aria-describedby="nameHelp" placeholder="Enter Username" required>
        </div>


        <div class="form-group col-md-8">
            <input class="btn btn-primary float-right" type="submit" placeholder="Interview Call">
            <br>
        </div>

        <div class="form-group col-md-8">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>


    </form>

</div>


@endsection
