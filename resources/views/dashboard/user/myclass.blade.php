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
       @foreach ($courses as $crs)
       <div class="col-md-4 col-sm-6">
        <div class="card mt-3 shadow">
            <div class="card-header">{{ $crs->Name }}</div>
            <img class="card-img-top center" src="{{ asset('assets/img/about.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Class Link
                    </a>
                   
                  </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        @forelse ($payments as $payment )
                        <a href="{{ $payment->course->Links}}" target="_blank">{{ $payment->course->Links}}</a>
                        @empty
                        <h5>You have to waiting for complete your account verification!</h5>
                        <div class="d-flex justify-content-center">
                            <div class="spinner-grow spinner-grow-sm text-primary mr-2" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow spinner-grow-sm  text-warning mr-2" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow spinner-grow-sm  text-success mr-2" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow spinner-grow-sm  text-danger mr-2" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                         </div>
                        @endforelse
                        
                        
                    </div>
                  </div>
                
            </div>
        </div>
    </div>
       @endforeach
</div>

</div>
@endsection