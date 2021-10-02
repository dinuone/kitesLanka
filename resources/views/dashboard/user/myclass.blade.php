@extends('layouts.stud')

@section('content')
<style>
    .card-img-top{max-width: 250px; max-height: 250px; }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
 
        }
</style>

  
<div class="container">
    
    <div class="row">
        @forelse ($payments as $payment)
        <div class="col-md-4 col-sm-6">
            <div class="card mt-3 shadow">
                <div class="card-header">{{ $payment->course->Name }}</div>
                <img class="card-img-top center" src="{{ asset('assets/img/about.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                          Class Link
                        </a>
                       
                      </p>
                      <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            
                            <a href="{{ $payment->course->Links}}" target="_blank">{{ $payment->course->Links}}</a>
                            
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
        @empty
        <div class="card shadow mt-3">
            <div class="card-header bg-warning">Notice!</div>
            <div class="card-body">
                <h1>You don't have registered any courses!</h1>
            </div>
        </div>
        @endforelse
    </div>

</div>
@endsection