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
                <p>Sending Your CV in Progress...</p>
            </div>
        </div>
    </div>
@endsection