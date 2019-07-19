@extends('layouts.admin_app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-2">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-exclamation" aria-hidden="true"></i></a>
                                    
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="tab-content " id="v-pills-tabContent">
                                    <div class="tab-pane fade show active card" style="width: 14rem;" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="card-body">
                                            <center><h3 class="card-title pt-2">{{ $completed }}</h3></center>
                                            <center><h6 class="card-subtitle text-muted pb-2">Samples Completed</h6></center>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade card" style="width: 14rem;" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="card-body">
                                            <center><h3 class="card-title pt-2">{{ $not_started }}</h3></center>
                                            <center><h6 class="card-subtitle text-muted pb-2">Samples Not Started</h6></center>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade card" style="width: 14rem;" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <div class="card-body">
                                            <center><h3 class="card-title pt-2">{{ $in_progress }}</h3></center>
                                            <center><h6 class="card-subtitle text-muted pb-2">Samples In Progress</h6></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                        <div class="row " style="margin-top:20px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="card-body  card border-secondary mb-3" style="max-width: 14rem;">
                                    <center><h3 class="card-title pt-2">{{ $client }}</h3></center>
                                    <center><h6 class="card-subtitle text-muted pb-2">Clients</h6></center>
                                </div>
                            </div>    
                        </div>
                        <div class="row " style="margin-top:20px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="card-body  card border-secondary mb-3" style="max-width: 14rem;">
                                    <center><h3 class="card-title pt-2">{{ $employee }}</h3></center>
                                    <center><h6 class="card-subtitle text-muted pb-2">Employee's Account</h6></center>
                                </div>
                            </div>    
                        </div>     
                    </div>             
                        <div class="col-md-4">
                            <canvas id="myChart" width="250" height="250"></canvas>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

@endsection