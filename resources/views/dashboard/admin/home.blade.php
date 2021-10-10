@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="row">
        <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $studToday}}</h3>
                    <p>Newly Register Students</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-users"></i>
                  </div>
                  <a href="{{ route('admin.todayreg') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col">
            <div class="small-box bg-success">
                <div class="inner">
                  <h3>5</h3>
                  <p>Total Available Courses</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('admin.duepayment') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header"><i class="far fa-chart-bar mr-2"></i>Student Registraion chart</div>
                <div class="card-body">
                    <canvas id="studchart" width="100%" height="100%"></canvas>
                </div>
            </div>
        </div>
    </div>

    
   
</div>
@endsection

<script>
    var _ydata = '{!! json_encode($months) !!}'
</script>