@extends('layouts.admin')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> <a href="/viewStudents">Students</a></li>
    <li class="breadcrumb-item active">{{$student->nameWithInit}}</li>
</ol>



            {{--<ul>--}}
                {{--<li>{{$student->nameWithInit}}</li>--}}
                {{--<li>{{$student->registration_no}}</li>--}}
                {{--<li>{{$student->email}}</li>--}}
                {{--<li>{{$student->contactNo}}</li>--}}
                {{--<li>{{$batch->batch}}</li>--}}



            {{--</ul>--}}

    <div class="container">
        <div class="row my-2">

            <div class="col-lg-9 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Company</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Log Book</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        {{--<h5 class="mb-3">Bio</h5>--}}
                        <div class="row">

                            <div class="col-lg-3 order-lg-1 text-center">
                                <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">

                            </div>

                            <div class="col-md-6">
                                <h6>Name</h6>
                                <p>
                                    {{$student->firstName." ".$student->lastName }}
                                </p>
                                <h6>Name with Initial</h6>
                                <p>
                                    {{$student->nameWithInit}}
                                </p>
                                <h6>Index number</h6>
                                <p>
                                    {{$student->indexNo}}
                                </p>
                                <h6>Registration Number</h6>
                                <p>
                                    {{$student->registration_no}}
                                </p>
                                <h6>Gender</h6>
                                <p>
                                    {{$student->gender}}
                                </p>
                                <h6>NIC</h6>
                                <p>
                                    {{$student->nic}}
                                </p>
                                <h6>email</h6>
                                <p>
                                    {{$student->email}}
                                </p>
                                <h6>Address</h6>
                                <p>
                                    {{$student->address}}
                                </p>
                                <h6>Contact number</h6>
                                <p>
                                    {{$student->contactNo}}
                                </p>
                                <h6>Batch</h6>
                                <p>
                                    {{$batch->batch}}
                                </p>
                            </div>





                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="messages">

                        <div class="col-md-9">
                            @if($company)
                            <h6>Name</h6>
                            <p>
                                {{$company->companyName}}
                            </p>
                            <h6>Name with Initial</h6>
                            <p>
                                 {{$company->requirement}}
                            </p>
                            <h6>Index number</h6>
                            <p>
                                {{$company->start_date}}
                            </p>
                            <h6>Registration Number</h6>
                            <p>
                                {{$company->end_date}}
                            </p>
                        @endif
                        </div>

                    </div>
                    <div class="tab-pane" id="edit">
                        <div class="container">


                            <form action="{{url('')}}" method="post" >
                                {{csrf_field()}}


                                        <!-- Example DataTables Card-->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fa fa-table"></i>Students</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Task</th>
                                                    <th>start_date</th>
                                                    <th>End_date</th>
                                                    <th>Description</th>

                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Task</th>
                                                    <th>start_date</th>
                                                    <th>End_date</th>
                                                    <th>Description</th>

                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                @foreach($task as $row)
                                                    <tr>
                                                        <td>{{$row->task}}</td>
                                                        <td>{{$row->start_date}}</td>
                                                        <td>{{$row->end_date}}</td>
                                                        <td>-</td>



                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer small text-muted"></div>
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
            </div>

        </div>
    </div>




@endsection
