@extends('layouts.student')

@section('content')
 <ol class="breadcrumb">
  <li class="breadcrumb-item">
   <a href="{{url('/home/'.Auth::user()->username)}}">Home</a>
  </li>
 </ol>

 <div class="container">
  <div class="card card-register mx-auto mt-5">
   <div class="card-header">My Interview List</div>
   <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
      <tr>
       <th>Company Name</th>
       <th>Category</th>
       <th>Interview Date And Time</th>
      </tr>
      </thead>

      <tbody>

      @foreach($Interviewedlists as $row)

       <tr>

        <td>{{$row->companyName}}</td>
        <td>{{$row->requirement}}</td>
        <td>{{$row->datetime}}</td>



       </tr>
      @endforeach


      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>
@endsection
