@extends('layouts.student')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/home/'.Auth::user()->username)}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Preference</li>
    </ol>

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Specialization Area Preferences</div>
            <div class="card-body">

                <div class="form-group row">
                    <div class="form-group col-6">
                        <label class="control-label" for="preference"> My Selected Preferences </label>

                        <ol>
                            @foreach($SrudentPreformance as $row)
                                <li>
                                    {{$row->requirement}}
                                </li>
                            @endforeach
                        </ol>

                    </div>
                    <div class="form-group col-6">
                        <label class="control-label" for="preference"> All Preferences </label>
                        <ol>
                            @foreach($Requirements as $row)
                                <li>
                                    {{$row->requirement}}
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

               <input type="button" class="btn btn-primary" style="float: right;width: 75px" value="Edit" onclick="window.location.href = '{{url('/changePreferences/'.Auth::user()->username)}}'">

                {{--<input type="button" class="btn btn-primary" style="float: right" value="Edit" onclick="window.location.href = "{{url('/home/'.Auth::user()->username)}}">--}}

                </div>



            </div>
        </div>
    </div>
@endsection