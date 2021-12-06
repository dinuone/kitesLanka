@extends('layouts.teacher')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>0</h3>
                        <p>My Courses</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Today Payments</p>
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
                        <h3>0</h3>
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


    @endsection
