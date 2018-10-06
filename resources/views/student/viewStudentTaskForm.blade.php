@extends('layouts.student')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/home/'.Auth::user()->username)}}">Home</a>
        </li>
    </ol>

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Task</div>
            <div class="card-body">
                @if($TaskCount != 0)
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Start Date</th>
                            <th>Complete Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>

                        @foreach($Tasks as $row)

                            <form action="{{url('/updateStudentTaskView')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="text" hidden name="task" value="{{$row->task}}">
                                <input type="date" hidden name="start_date" value="{{$row->start_date}}">
                                <input type="date" hidden name="end_date" value="{{$row->end_date}}">
                                <input type="text" hidden name="registration_no" value="{{$row->registration_no}}">
                                <input type="text" hidden name="companyId" value="{{$row->companyId}}">

                            <tr>
                                <td>{{$row->task}}</td>
                                <td>{{$row->start_date}}</td>
                                <td>{{$row->end_date}}</td>
                                    <td>
                                        <input class="btn btn-primary" style="width: 75px" type="submit" value="Edit" name="submit">
                                        <input type="button" class="btn btn-danger" style="width: 75px" value="Delete" onclick="window.location.href = '{{url('/taskRemove/'.$row->task.'/'.$row->registration_no.'/'.$row->companyId)}}'">
                                    </td>

                            </tr>
                            </form>

                        @endforeach


                        </tbody>
                    </table>
                </div>
                @endif
                <form action="{{url('/addTask')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="TaskName">Task</label>
                                <input class="form-control" id="taskName" name="taskName" type="text" aria-describedby="nameHelp" placeholder="Enter task">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="StartDate">Start Date</label>
                                <input class="form-control" id="startDate" name="startDate" type="date" aria-describedby="nameHelp" min="{{$Date}}">
                            </div>
                            <div class="col-md-6">
                                <label for="StartDate">Complete Date</label>
                                <input class="form-control" id="endDate" name="endDate" type="date" aria-describedby="nameHelp" min="{{$Date}}">
                            </div>
                        </div>
                        <input class="form-control" type="text" value="{{Auth::user()->username}}" name="username" hidden >

                        <input class="btn btn-primary"  style="float: right; margin-top: 10px" type="submit" value="Submit" name="submit">

                    </div>
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