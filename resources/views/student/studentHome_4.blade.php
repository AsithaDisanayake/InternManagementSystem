@extends('layouts.student')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/home/'.Auth::user()->username)}}">Home</a>
        </li>
    </ol>

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Welcome to Professional Development Center</div>
            <div class="card-body">
                <p> 1) Complete your profile</p>
                <p> 2) Select your preferences <b>befor 2018-09-10</b></p>
            </div>
        </div>
    </div>
@endsection