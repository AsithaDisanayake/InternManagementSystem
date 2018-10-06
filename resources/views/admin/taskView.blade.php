@extends('layouts.admin')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>

    </li>
    <li class="breadcrumb-item">
        <a href="#">Students</a>
    </li>
    <li class="breadcrumb-item">
        <a href="#">Tasks</a>
    </li>
    <li class="breadcrumb-item active"></li>


</ol>
<div class="container">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Task View</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Registration number</th>
                        <th>Company Name</th>
                        <th>task</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Registration number</th>
                        <th>Company Name</th>
                        <th>task</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($task as $row)


                        <tr>
                            <td >{{$row->nameWithInit}}</td>
                            <td>{{$row->registration_no}}</td>
                            <td>{{$row->companyName}}</td>
                            <td>{{$row->task}}</td>
                            <td>{{$row->start_date}}</td>
                            <td>{{$row->end_date}}</td>




                        </tr>


                    @endforeach


                    </tbody>
                </table>

            </div>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>




</div>


@endsection
