@extends('layouts.student')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{url('/home/'.Auth::user()->username)}}">Home</a>
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
                <form action="{{url('/updateStudentDetails')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="FirstName">First Name</label>
                                @if($Student->firstName == '')
                                    <input class="form-control" id="firstName" name="firstName" type="text" aria-describedby="nameHelp" placeholder="Enter first name" required>
                                @else
                                    <input class="form-control" id="firstName" name="firstName" type="text" aria-describedby="nameHelp" value="{{$Student->firstName}}" required>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="LastName">Last Name</label>
                                @if($Student->lastName == '')
                                    <input class="form-control" id="lastName" name="lastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name" required>
                                @else
                                    <input class="form-control" id="lastName" name="lastName" type="text" aria-describedby="nameHelp" value="{{$Student->lastName}}" required>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="NamewithInitial">Name with Initials</label>
                        <input class="form-control" id="nameWithInitial" name="nameWithInitial" required type="text" aria-describedby="nameWithInitialHelp" value="{{$Student->nameWithInit}}">
                    </div>

                    <div class="form-group">
                        <label for="UserName">User Name</label>
                        <input class="form-control" id="userName" name="userName" type="text" required aria-describedby="userNameHelp" value="{{Auth::user()->username}}" readonly>
                    </div>
                    <div class="form-group">

                        <label for="IndexNumber">Index Number</label>
                        @if($Student->indexNo == '')
                            <input class="form-control" id="indexNumber" name="indexNumber" required type="number" aria-describedby="indexNumberHelp">
                        @else
                            <input class="form-control" id="indexNumber" name="indexNumber" required type="number" aria-describedby="indexNumberHelp" value="{{$Student->indexNo}}">
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="Email">Email Address</label>
                        <input class="form-control" id="email" name="email" type="email" required aria-describedby="emailHelp" value="{{$Student->email}}">
                    </div>

                    <div class="form-group">
                        <label for="NICNumber">NIC Number</label>
                        @if($Student->nic == '')
                            <input class="form-control" id="NICNumber" name="NICNumber" required type="text" aria-describedby="NICNumberHelp" placeholder="Enter NIC Number">
                        @else
                            <input class="form-control" id="indexNumber" name="NICNumber" required type="text" aria-describedby="indexNumberHelp" value="{{$Student->nic}}">
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="gender">Gender</label>
                        <div class="controls form-row">
                            @if($Student->gender == '')
                                <label class="radio inline col-md-6" for="gender-0">
                                    <input name="gender" id="Male" value="Male" checked="checked" type="radio"> Male
                                </label>
                                <label class="radio inline col-md-6" for="gender-1">
                                    <input name="gender" id="Female" value="Female" type="radio"> Female
                                </label>
                            @elseif($Student->gender == 'Male')
                                <label class="radio inline col-md-6" for="gender-0">
                                    <input name="gender" id="Male" value="Male" checked="checked" type="radio"> Male
                                </label>
                                <label class="radio inline col-md-6" for="gender-1">
                                    <input name="gender" id="Female" value="Female" type="radio"> Female
                                </label>
                            @else
                                <label class="radio inline col-md-6" for="gender-0">
                                    <input name="gender" id="Male" value="Male"  type="radio"> Male
                                </label>
                                <label class="radio inline col-md-6" for="gender-1">
                                    <input name="gender" id="Female" value="Female" checked="checked" type="radio"> Female
                                </label>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        @if($Student->address == '')
                            <textarea class="form-control" id="address" required name="address" type="tex" aria-describedby="addressHelp" placeholder="Enter Address"></textarea>
                        @else
                            <textarea class="form-control" id="address" required name="address" type="tex" aria-describedby="addressHelp">{{$Student->address}}</textarea>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="MobileNumber">Mobile Number</label>
                        @if($Student->contactNo == '')
                            <input class="form-control" id="mobileNumber" required name="mobileNumber" type="tel" aria-describedby="mobileHelp" placeholder="Enter Mobile Number">
                        @else
                            <input class="form-control" id="indexNumber" required name="mobileNumber" type="tel" aria-describedby="indexNumberHelp" value="{{$Student->contactNo}}">
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="CV">Upload Profile picture</label>
                        <input type="file" name="uploadProfilePic" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="CV">Upload CV</label>
                        <input type="file" name="uploadCV" class="form-control">
                    </div>
                    <input class="btn btn-primary"  style="float: right" type="submit" value="Submit" name="submit">
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
