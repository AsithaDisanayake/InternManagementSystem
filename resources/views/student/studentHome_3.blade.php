@extends('layouts.student')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/home/'.Auth::user()->username)}}">Home</a>
        </li>
    </ol>

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Intern Details</div>
            <div class="card-body">
                <p>Congratulations on being selected for <b>{{$Intern->requirement}}</b> position with <b>{{$Intern->companyName}}</b>.</p>
                <p>Your intern period is from <b>{{$Intern->start_date}} </b> to <b>{{$Intern->end_date}}</b>.</p>
            </div>
        </div>
    </div>
@endsection