@extends('layouts.admin')

@section('content')
        <!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"></li>


</ol>


<div class="row">
    <div class="col-lg-12">
        <!-- Example Bar Chart Card-->

        <h1>Welcome to the Professional Development Center</h1>

    </div>

</div>
<div class="card md-3">
    <div class="card-header">
        <i class="fa fa-pie-chart"></i>  Current Intern Process</div>
    <div class="card-body">
        <canvas id="myChart" width="100%" height="30"></canvas>
    </div>

</div>


@endsection

@section('myjsfile')
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["CV not Sent", "Cv Sent", "Interview Call", "Selected"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
//                        'rgba(153, 102, 255, 0.2)',
//                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
//                        'rgba(153, 102, 255, 1)',
//                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },

        });
    </script>

@endsection