@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col">
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>{{ $studToday }}</h3>
                        <p>Newly Register Students</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('admin-todayreg') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>{{ $courseCount }}</h3>
                        <p>Total Available Courses</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chalkboard"></i>
                    </div>
                    <a href="{{ route('admin-avb-course') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $duecount }}</h3>
                        <p>Payments Due</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <a href="{{ route('admin-duepayment') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3>{{ $studcount }}</h3>
                        <p>Total Students </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-gray">
                    <div class="inner">
                        <h3>{{ $teachercount }}</h3>
                        <p>Total Teachers </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>Rs.{{ $income }}</h3>
                        <p>This Month: Income </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-bill-alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-navy"><i class="far fa-chart-bar mr-2"></i>Student Registraion chart</div>
                    <div class="card-body">
                        <div id="studchart" width="100%" height="100%"></div>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            var studdata = <?php echo json_encode($studdata); ?>;
            Highcharts.chart('studchart', {


                title: {
                    text: 'New Students Growth, 2022'
                },
                subtitle: {
                    text: 'Source: positronx.io'
                },
                xAxis: {
                    categories: [
                        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                        'October', 'November', 'December'
                    ]
                },
                yAxis: {
                    title: {
                        text: 'Number of New Students'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true
                    }
                },
                series: [{
                    name: 'New Students',
                    data: studdata
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
        </script>


    @endsection
