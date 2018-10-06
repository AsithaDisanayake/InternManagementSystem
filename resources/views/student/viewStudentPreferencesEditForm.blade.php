@extends('layouts.student')

@section('content')
    <!-- Breadcrumbs-->
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
                <form action="{{url('/updateStudentPreferences')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label" for="preference">Indicate your preferred areas for the consideration of the industrial placement program. </label>

                        <label class="control-label" for="preference">  Please note that you are required to select <b> three (03) </b>  from the given list of specialized areas. </label>

                        <label class="control-label" for="preference">  <b>Note:</b> Your CV will be send to relevant companies based on this selection, considering the company requirements. </label>
                        <div class="controls form-row">
                            {{--<label class="radio inline col-md-6" for="gender-0">--}}
                            {{--<input name="gender" id="Male" value="Male" checked="checked" type="radio"> Male--}}
                            {{--</label>--}}
                            {{--<label class="radio inline col-md-6" for="gender-1">--}}
                            {{--<input name="gender" id="Female" value="Female" type="radio"> Female--}}
                            {{--</label>--}}
                            <ol>
                                @foreach($Requirements as $row)

                                    <li>
                                        <input type="checkbox" name="preference[]" value="{{$row->requirementId}}">{{$row->requirement}}
                                    </li>
                                @endforeach
                            </ol>

                        </div>

                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" value="{{Auth::user()->username}}" name="username" hidden >
                    </div>

                    <input class="btn btn-primary" style="float: right; width: 75px" type="submit" value="Submit" name="submit">

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
