@extends('layouts.company')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> <a href="">Requirement</a></li>
    {{--<li class="breadcrumb-item active">{{$student->nameWithInit}}</li>--}}
</ol>



<div class="container">
    <div class="row my-2">

        <div class="col-lg-12 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Add Requirements</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">New Requirement</a>
                </li>

            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    {{--<h5 class="mb-3">Bio</h5>--}}
                    <div class="row">

                        <div class="col-lg-7 order-lg-1 text-center">


                            <!-- Example DataTables Card-->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fa fa-table"></i> Your Requirement</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Requirement</th>
                                                <th>year</th>
                                                <th>Vacancies</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($companyRequirement as $row)

                                            <tr>

                                                <td>{{$row->requirement}}</td>
                                                <td>{{$row->year}}</td>
                                                <td>{{$row->vacancies}}</td>

                                                <td><input type="button" class="btn btn-danger" value="remove" onclick="window.location.href = '{{url('/company/removeRequirement/'.$row->requirementId).'/'.Auth::user()->username}}'"></td>


                                            </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer small text-muted"></div>
                            </div>

                        </div>

                        <div class="col-md-5">

                            <form action="{{url('/company/selectRequirement')}}" method="post" >
                                {{csrf_field()}}


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Requirement</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" name="requirementId" class="form-control" size="0">
                                            @foreach($Requirements as $row)
                                            <option value="{{$row->requirementId}}" >{{$row->requirement}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Year</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" value="year" name ="year" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Vacancies</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" value="Vacancies" name="vacancies" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="tel" value="{{Auth::user()->username}}" name="username" hidden >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">

                                        <input type="submit" class="btn btn-primary" value="Add">
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>





                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="messages">

                    {{--<h5 class="mb-3">Bio</h5>--}}
                    <div class="row">

                        <div class="col-lg-7 order-lg-1 text-center">


                            <!-- Example DataTables Card-->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fa fa-table"></i> Current Requirement</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="dataTable2" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Requirement</th>
                                                {{--<th>year</th>--}}
                                                {{--<th>Vacancies</th>--}}


                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($Requirements as $row)
                                            <tr>

                                                <td>{{$row->requirement}}</td>
                                                {{--<td>{{$row->year}}</td>--}}
                                                {{--<td>{{$row->vacancies}}</td>--}}




                                            </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer small text-muted"></div>
                            </div>

                        </div>

                        <div class="col-md-5">
                            <form action="{{url('/company/newRequirement')}}" method="post" >
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Requirement</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" name="requirement" placeholder="SE/Web Developing/Mobile/IOT....." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Languages<br>(Specialize areas)</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" name="specialized" placeholder="java/c/c#/python/js/etc...." required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Year</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" name="year" placeholder="current year" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Vacancies</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="tel" value="" name="vacancies" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="tel" value="{{Auth::user()->username}}" name="username" hidden >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">

                                        <input type="submit" class="btn btn-primary" value="Request">
                                    </div>
                                </div>
                            </form>
                        </div>





                    </div>
                    <!--/row-->
                </div>

            </div>
        </div>

    </div>
</div>




@endsection
@section('script')



@stop