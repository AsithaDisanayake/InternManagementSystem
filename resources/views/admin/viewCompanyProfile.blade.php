@extends('layouts.admin')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> <a href="/viewStudents">Company</a></li>
    <li class="breadcrumb-item active">{{$company->companyName}}</li>
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

            <div class="col-lg-12 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Current Students</a>
                    </li>

                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Company Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Name</h6>
                                <p>
                                    {{$company->companyName }}
                                </p>

                                <h6>email</h6>
                                <p>
                                    {{$company->email}}
                                </p>
                                <h6>Address</h6>
                                <p>
                                    {{$company->address}}
                                </p>
                                <h6>Contact number</h6>
                                <p>
                                    {{$company->contactNo}}
                                </p>

                            </div>


                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="messages">


                        <div class="container">


                            <form action="{{url('')}}" method="post" >
                                {{csrf_field()}}


                                        <!-- Example DataTables Card-->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fa fa-table"></i> Current Company Students</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Registration no</th>

                                                    <th>Field</th>
                                                    <th>Intern Start Date</th>
                                                    <th>Intern End Date</th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                @foreach($currentStudent as $row)
                                                    <tr>
                                                        <td>{{$row->nameWithInit}}</td>
                                                        <td>{{$row->registration_no}}</td>
                                                        <td>{{$row->requirement}}</td>
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
