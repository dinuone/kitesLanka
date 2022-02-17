@extends('layouts.stud')

@section('content')
<style>
    #bg--img{
        display: flex;
        max-width: 1000px;
        position: absolute;
        right: 0px;
        bottom: 0px;
    }

    #msg{
        background: linear-gradient(90deg, #4B0082 0%, #3a47d5 100%);
        color: white;
        font-family: 'Inter',sans-serif;
        font-weight: 400;
    }
</style>
    <div class="container">
        @if (Session::get('success'))
        <div class="alert bg-teal" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
         @endif

        <img src="{{ asset('bg-feedback.jpg') }}" alt="bg-img" id="bg--img">
        <div class="col-md-6">
            <div class="card shadow" id="msg">
                <div class="card-body">
                    <p> <b>Hi {{ Auth::guard('student')->user()->FullName }}</b>, how was your experience with kiteslanka learning management system? 
                    leave us a review to help us make kiteslanka even better for you and other guests. </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ route('store-feedback') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::guard('student')->user()->id}}">
                <div class="card shadow">
                    <div class="card-header bg-gray">Give your Feedback <i class="far fa-star"></i> <i class="fas fa-star-half"></i> <i class="fas fa-star"></i></div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="name" value="{{ Auth::guard('student')->user()->FullName }}" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="E mail address" value="{{ Auth::guard('student')->user()->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <textarea name="feedback_msg" id="" cols="30" rows="10" class="form-control"></textarea>
                             @error('feedback_msg')
                            <div class="text-danger">{{ $message }}</div>
                             @enderror
                        </div>
                        <button class="btn bg-teal" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
       
       
    </div>

@endsection