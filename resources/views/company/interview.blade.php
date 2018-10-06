@extends('layouts.company')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>

    </li>
    <li class="breadcrumb-item">
        <a href="#">Interview Process</a>
    </li>
    <li class="breadcrumb-item active"></li>


</ol>
<div class="container">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i>Students</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>

                        <th>Contact No</th>
                        <th>Preference</th>

                        <th>Status</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>

                        <th>Contact No</th>
                        <th>Preference</th>

                        <th>Status</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($cv as $row)
                        <form action="{{url('/company/interview/confirm')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="text" name="nameWithInit" value="{{$row->nameWithInit}}" class="form-control" hidden>
                            <input type="text" name="email" value="{{$row->email}}" class="form-control" hidden>
                            <input type="text" name="requirementId" value="{{$row->requirementId}}" class="form-control" hidden>
                            <input type="text" name="companyId" value="{{$row->companyId}}" class="form-control" hidden>
                            <input type="text" name="registration_no" value="{{$row->registration_no}}" class="form-control" hidden>
                            <input type="text" name="requirement" value="{{$row->requirement}}" class="form-control" hidden>
                            <input type="text" name="year" value="{{$row->year}}" class="form-control" hidden>

                        <tr>
                            <td ><a href="">{{$row->nameWithInit}}</a></td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->contactNo}}</td>
                            <td >{{$row->requirement}}</td>


                            <td> <input class="btn btn-primary " value = "select Candidate" type="submit" placeholder="" ><td>

                        </tr>
                        </form>

                    @endforeach


                    </tbody>
                </table>

            </div>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>




</div>


@endsection
