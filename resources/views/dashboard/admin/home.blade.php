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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-navy"><i class="far fa-chart-bar mr-2"></i>Student Registraion chart</div>
                    <div class="card-body">
                        <h4>{{ $chart1->options['chart_title'] }}</h4>
                        {!! $chart1->renderHtml() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-navy"><i class="far fa-chart-bar mr-2"></i>Income</div>
                    <div class="card-body">
                        <h4>{{ $chart2->options['chart_title'] }}</h4>
                        {!! $chart2->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @section('scripts')
        {!! $chart1->renderChartJsLibrary() !!}
        {!! $chart1->renderJs() !!}
        {!! $chart2->renderJs() !!}
    @endsection
