@extends('layouts.student')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/home/'.Auth::user()->username)}}">Home</a>
        </li>
    </ol>

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Status of CV</div>
            <div class="card-body">
                @if($ReceivedCount == 1)
                    <p>Your CV has been <b>{{$ReceivedCount}}</b>  time</p>
                @else
                    <p>Your CV has been sent <b>{{$ReceivedCount}}</b> times</p>
                @endif
            </div>
        </div>
    </div>
@endsection