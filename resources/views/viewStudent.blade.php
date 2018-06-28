@extends('layouts.student')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Profile</li>
</ol>

    {{--<a class="nav-link" data-toggle="modal" data-target="#exampleModal">--}}
        {{--{{ Auth::user()->firstname }}--}}
        {{--<i class="fa fa-fw fa-sign-out"></i> Logout</a>--}}

{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('usertype'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('usertype') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--{{Auth::user()->username}}--}}

                        {{--<div class="alert alert-success">--}}
                           {{--Blaaaaa--}}
                        {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Profiles</div>
            <div class="card-body">
                <form action="{{url('/updateStudent')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="FirstName">First Name</label>
                                <input class="form-control" id="firstName" name="firstName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
                            </div>
                            <div class="col-md-6">
                                <label for="LastName">Last Name</label>
                                <input class="form-control" id="lastName" name="lastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="NamewithInitial">Name with Initials</label>
                        <input class="form-control" id="nameWithInitial" name="nameWithInitial" type="text" aria-describedby="nameWithInitialHelp" placeholder="Enter Name with Initials">
                    </div>

                    <div class="form-group">
                        <label for="UserName">User Name</label>
                        <input class="form-control" id="userName" name="userName" type="text" aria-describedby="userNameHelp" value="{{Auth::user()->username}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="UserName">Index Number</label>
                        <input class="form-control" id="indexNumber" name="indexNumber" type="number" aria-describedby="userNameHelp">
                    </div>

                    <div class="form-group">
                        <label for="Email">Email Address</label>
                        <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" value="{{Auth::user()->email}}">
                    </div>

                    <div class="form-group">
                        <label for="NICNumber">NIC Number</label>
                        <input class="form-control" id="NICNumber" name="NICNumber" type="txt" aria-describedby="NICNumberHelp" placeholder="Enter NIC Number">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="gender">Gender</label>
                        <div class="controls form-row">
                                <label class="radio inline col-md-6" for="gender-0">
                                    <input name="gender" id="Male" value="Male" checked="checked" type="radio"> Male
                                </label>
                                <label class="radio inline col-md-6" for="gender-1">
                                    <input name="gender" id="Female" value="Female" type="radio"> Female
                                </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <textarea class="form-control" id="address" name="address" type="tex" aria-describedby="addressHelp" placeholder="Enter Address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="MobileNumber">Mobile Number</label>
                        <input class="form-control" id="mobileNumber" name="mobileNumber" type="tel" aria-describedby="mobileHelp" placeholder="Enter Mobile Number">
                    </div>
                    <div class="form-group">
                        <label for="CV">Upload CV</label>
                        <input type="file" name="uploadCV" class="form-control">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Update" name="submit">
                </form>

                <div class="form-group col-md-8">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
