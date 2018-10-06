<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>INPRO</title>
  <!-- Bootstrap core CSS-->

  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{url('/home/'.Auth::user()->username)}}">student</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>-
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{url('/home/'.Auth::user()->username)}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">News Feed</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{url('/viewStudentDetailsForm/'.Auth::user()->username)}}">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{url('/viewStudentPreferences/'.Auth::user()->username)}}">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Preference</span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{url('/studentTask/'.Auth::user()->username)}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tasks</span>
          </a>
        </li>

        {{--{{$ReceivedCount}}--}}



        {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">--}}
          {{--<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">--}}
            {{--<i class="fa fa-fw fa-wrench"></i>--}}
            {{--<span class="nav-link-text">Components</span>--}}
          {{--</a>--}}
          {{--<ul class="sidenav-second-level collapse" id="collapseComponents">--}}
            {{--<li>--}}
              {{--<a href="navbar.html">Navbar</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a href="cards.html">Cards</a>--}}
            {{--</li>--}}
          {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">--}}
          {{--<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">--}}
            {{--<i class="fa fa-fw fa-file"></i>--}}
            {{--<span class="nav-link-text">Example Pages</span>--}}
          {{--</a>--}}
          {{--<ul class="sidenav-second-level collapse" id="collapseExamplePages">--}}
            {{--<li>--}}
              {{--<a href="login.html">Login Page</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a href="register.html">Registration Page</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a href="forgot-password.html">Forgot Password Page</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a href="blank.html">Blank Page</a>--}}
            {{--</li>--}}
          {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">--}}
          {{--<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">--}}
            {{--<i class="fa fa-fw fa-sitemap"></i>--}}
            {{--<span class="nav-link-text">Menu Levels</span>--}}
          {{--</a>--}}
          {{--<ul class="sidenav-second-level collapse" id="collapseMulti">--}}
            {{--<li>--}}
              {{--<a href="#">Second Level Item</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a href="#">Second Level Item</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a href="#">Second Level Item</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>--}}
              {{--<ul class="sidenav-third-level collapse" id="collapseMulti2">--}}
                {{--<li>--}}
                  {{--<a href="#">Third Level Item</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                  {{--<a href="#">Third Level Item</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                  {{--<a href="#">Third Level Item</a>--}}
                {{--</li>--}}
              {{--</ul>--}}
            {{--</li>--}}
          {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">--}}
          {{--<a class="nav-link" href="#">--}}
            {{--<i class="fa fa-fw fa-link"></i>--}}
            {{--<span class="nav-link-text">Link</span>--}}
          {{--</a>--}}
        {{--</li>--}}
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown" hidden>
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
              {{--<strong>David Miller</strong>--}}
              {{--<span class="small float-right text-muted">11:21 AM</span>--}}
              {{--<div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
              {{--<strong>Jane Smith</strong>--}}
              {{--<span class="small float-right text-muted">11:21 AM</span>--}}
              {{--<div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
              {{--<strong>John Doe</strong>--}}
              {{--<span class="small float-right text-muted">11:21 AM</span>--}}
              {{--<div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown" hidden>
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
              {{--<span class="text-success">--}}
                {{--<strong>--}}
                  {{--<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
              {{--</span>--}}
              {{--<span class="small float-right text-muted">11:21 AM</span>--}}
              {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
              {{--<span class="text-danger">--}}
                {{--<strong>--}}
                  {{--<i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>--}}
              {{--</span>--}}
              {{--<span class="small float-right text-muted">11:21 AM</span>--}}
              {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
              {{--<span class="text-success">--}}
                {{--<strong>--}}
                  {{--<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
              {{--</span>--}}
              {{--<span class="small float-right text-muted">11:21 AM</span>--}}
              {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item" hidden>
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              {{ Auth::user()->username }}
            <i class="fa fa-fw fa-sign-out"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">

        {{--Content--}}


        @yield('content')




        {{--/content--}}
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>UCSC|PDC</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    @guest

    @else
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}"Logout
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                {{ __('Logout') }}>
                Logout
            </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </div>
      </div>
    </div>
    @endguest

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{asset('js/sb-admin-datatables.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-charts.min.js')}}"></script>


  </div>
</body>

</html>
