@extends('layouts.admin')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Companies</li>
</ol>
<div class="container">


<form action="{{url('')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}


            <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i>Companies</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact No</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact No</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($company as $row)
                    <tr>
                        <td><a href="#">{{$row->companyName}}</a></td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->address}}</td>
                        <td>{{$row->contactNo}}</td>

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
@endsection
