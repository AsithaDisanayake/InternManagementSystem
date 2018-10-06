@extends('layouts.student')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/home/'.Auth::user()->username)}}">Home</a>
        </li>
    </ol>

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Edit Task</div>
            <div class="card-body">
                <form action="{{url('/editTask')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="TaskName">Task</label>
                                <input class="form-control" id="taskName" name="taskName" type="text" aria-describedby="nameHelp" value="{{$TaskDetails->task}}" placeholder="Enter task" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="StartDate">Start Date</label>
                                <input class="form-control" id="startDate" name="startDate" type="date" aria-describedby="nameHelp" value="{{$TaskDetails->start_date}}" min="{{$Date}}">
                            </div>
                            <div class="col-md-6">
                                <label for="StartDate">Complete Date</label>
                                <input class="form-control" id="endDate" name="endDate" type="date" aria-describedby="nameHelp" value="{{$TaskDetails->end_date}}" min="{{$Date}}">
                            </div>
                        </div>
                        <input class="form-control" type="text" value="{{Auth::user()->username}}" name="username" hidden >
                        <input class="form-control" type="text" value="{{$TaskDetails->companyId}}" name="companyId"  id="companyId" hidden >

                        <input class="btn btn-primary" style="margin-top: 10px ; float: right" type="submit" value="Submit" name="submit">

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