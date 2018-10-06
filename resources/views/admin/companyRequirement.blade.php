@extends('layouts.admin')

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
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Requirements</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Company Requirements</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edittab" data-toggle="tab" class="nav-link">Requested Requirements</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    {{--<h5 class="mb-3">Bio</h5>--}}
                    <div class="row">

                        <div class="col-lg-7 order-lg-1 text-center">


                            <!-- Example DataTables Card-->
                            <div class="card mb-3">
                                <div class="card-header-tabs">
                                    {{--<i class="fa fa-table"></i> Current Requirement--}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-light" id="dataTable2" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>

                                                <th>Requirement</th>

                                                <th>option</th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($requirement as $row)
                                            <tr id="rowdata">
                                                <td > <span style="float: left">{{$row->requirement}}</span>
                                                </td >

                                                <td >
                                                <div class="btn-group btn-group-sm" style="float: right">
                                                    <button type="button" class="btn btn-primary"  onclick="setData()">Edit</button>
                                                <input type="button" class="btn btn-danger" value="remove" onclick="window.location.href = '{{url('/admin/requirement/delete/'.$row->requirementId)}}'">


                                                </div>

                                                </td>





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
                            <form action="{{url('/admin/createrequirement')}}" method="post" >
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Requirement</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="requirement" name="requirement" placeholder="SE/Web Developing/Mobile/IOT....." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Languages<br>(Specialize areas)</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" name="specialized" placeholder="java/c/c#/python/js/etc...." required>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="{{Auth::user()->username}}" name="username" hidden >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">

                                        <input type="submit" class="btn btn-primary" value="Create Requirement">
                                    </div>
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
                    <!--/row-->

                </div>
                <div class="tab-pane" id="messages">



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

                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($companyRequirement as $row)

                                            <tr>

                                            <td>{{$row->companyName}}</td>
                                            <td>{{$row->requirement}}</td>
                                            <td>{{$row->vacancies}}</td>
                                            <td>{{$row->year}}</td>


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
{{--edit contain--}}

                    {{--<h5 class="mb-3">Bio</h5>--}}
                    <div class="row">

                        <div class="col-lg-7  text-center " style="float: left">


                            <!-- Example DataTables Card-->
                            <div class="card mb-3">
                                <div class="card-header-tabs">
                                    {{--<i class="fa fa-table"></i> Current Requirement--}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-light" id="dataTable3" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>

                                                <th>Requirement</th>

                                                <th>option</th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($newrequirement as $row)
                                                <tr id="rowdata">
                                                    <td > <span style="float: left">{{$row->requirement}}</span>
                                                    </td >

                                                    <td >
                                                        <div class="btn-group btn-group-sm" style="float: right">
                                                            <button type="button" class="btn btn-primary"  onclick="setData()">Edit</button>
                                                            <input type="button" class="btn btn-danger" value="remove" onclick="window.location.href = '{{url('/admin/requirement/delete/'.$row->requirementId)}}'">


                                                        </div>

                                                    </td>


                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer small text-muted"></div>
                            </div>

                        </div>

                        <div class="col-md-5" style="float: right">
                            <form action="{{url('/company/newRequirement')}}" method="post" >
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Requirement</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" id="requirement" name="requirement" placeholder="SE/Web Developing/Mobile/IOT....." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Languages<br>(Specialize areas)</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" name="specialized" placeholder="java/c/c#/python/js/etc...." required>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="{{Auth::user()->username}}" name="username" hidden >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">

                                        <input type="submit" class="btn btn-primary" value="Accept Request">
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

<script>

    function setData(){

        var Row = document.getElementById("rowdata");
        var Cells = Row.getElementsByTagName("td");

        document.getElementById("requirement").value = Cells[0].innerText ;
    }

</script>

@endsection
