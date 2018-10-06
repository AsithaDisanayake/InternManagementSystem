@extends('layouts.admin')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> <a href="/viewStudents">Intern Process</a></li>
    {{--<li class="breadcrumb-item active">{{$student->nameWithInit}}</li>--}}
</ol>



<div class="container">
    <div class="row my-2">

        <div class="col-lg-12 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Company Requirements</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">sent CV</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edittab" data-toggle="tab" class="nav-link">Selected CV</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="col-lg-12 order-lg-1 text-center">


                        <!-- Example DataTables Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Requirement</th>
                                            <th>Vacancies</th>
                                            <th>year</th>
                                            <th>Option</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($companyRequirement as $row)

                                            <tr>

                                                <td>{{$row->companyName}}</td>
                                                <td>{{$row->requirement}}</td>
                                                <td>{{$row->vacancies}}</td>
                                                <td>{{$row->year}}</td>


                                                <td><input type="button" class="btn btn-primary" value="Send CV" onclick="window.location.href = '{{url('/intern/sendCv/'.$row->companyId.'/'.$row->requirementId.'/'.$row->vacancies)}}'"></td>






                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer small text-muted"></div>
                        </div>

                    </div>

                    <div class="form-group col-md-8">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="messages">

                    <div class="col-lg-12 order-lg-1 text-center">


                        <!-- Example DataTables Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Registration No</th>
                                            <th>Name With initials</th>
                                            <th>Requirement</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($sentCv as $row)

                                            <tr>

                                                <td>{{$row->companyName}}</td>
                                                <td>{{$row->registration_no}}</td>
                                                <td>{{$row->nameWithInit}}</td>
                                                <td>{{$row->requirement}}</td>


                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer small text-muted"></div>
                        </div>

                    </div>




                </div>
                <div class="tab-pane" id="edittab">

                    <div class="col-lg-12 order-lg-1 text-center">


                        <!-- Example DataTables Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Registration No</th>
                                            <th>Name With initials</th>
                                            <th>Requirement</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($selectedCv as $row)

                                            <tr>

                                                <td>{{$row->companyName}}</td>
                                                <td>{{$row->registration_no}}</td>
                                                <td>{{$row->nameWithInit}}</td>
                                                <td>{{$row->requirement}}</td>






                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer small text-muted"></div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

    </div>
</div>


@endsection
