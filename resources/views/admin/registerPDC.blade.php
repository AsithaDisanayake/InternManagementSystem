@extends('layouts.admin')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Register PDC</li>
</ol>
<div class="container">


<form action="{{url('/registPDC')}}" method="post" >
    {{csrf_field()}}
    <div class="form-group col-md-8">

    <label for="exampleInputName">Full name</label>
    <input class="form-control" id="companyName" name="companyName"type="text" aria-describedby="nameHelp" placeholder="Enter full name" required>


    </div>
    <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Email address</label>
        <input class="form-control" id="email" name="email"  type="email" aria-describedby="emailHelp" placeholder="Enter email" required>
    </div>

    <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Address</label>
        <input class="form-control" id="address" name="address" type="text" aria-describedby="nameHelp" placeholder="Enter Address" required>
    </div>
    <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Contact No</label>
        <input class="form-control" id="contactNo" name="contactNo" type="text" aria-describedby="nameHelp" placeholder="Enter Contact No" required>
    </div>

    <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Username</label>
        <input class="form-control" id="username"  name="username" type="text" aria-describedby="nameHelp" placeholder="Enter Username" required>
    </div>

    <div class="form-group col-md-8">
        <input class="btn btn-primary float-right" type="submit" placeholder="Register">
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
