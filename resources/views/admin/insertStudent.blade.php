@extends('layouts.admin')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Enroll Student</li>
</ol>
<div class="container">


<form action="{{url('/upload')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}


    <div class="form-group">
        <label for="batch">Batch</label>
        <input type="text" name="batch" class="form-control">

    </div>

    <div class="form-group">
        <label for="upload-file">Upload your CSV file here</label>
        <input type="file" name="upload-file" class="form-control">

    </div>

    <input class="btn btn-success" type="submit" value="upload" name="submit">

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
