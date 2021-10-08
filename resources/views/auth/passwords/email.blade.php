
@extends('layouts.app')
@section('content')
<style>
    #frm{padding-top: 100px; padding-bottom: 50px;}
</style>

<div class="container padding-bottom-3x mb-2 mt-5" id=frm>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="forgot">
                <h2>Forgot your password?</h2>
                <p>Change your password in three easy steps. This will help you to secure your password!</p>
                <ol class="list-unstyled">
                    <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
                    <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link</li>
                    <li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
                </ol>
            </div>
            <form class="card mt-4" method="POST" action="{{ route('student.forget.email') }}">
                @csrf
                @if(Session::get('message'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('message') }}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <div class="form-group"> 
                            <label for="email-for-pass">Enter your email address</label> 
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                            <small class="form-text text-muted">Enter the email address you used during the registration on Kiteslanka.com. Then we'll email a link to this address.</small> </div>
                           <span class="text-danger">@error('email') {{ $message }}@enderror</span>
                        </div>
                    <div class="card-footer"> <button class="btn btn-success" type="submit">Get New Password</button> <a class="btn btn-danger" href="{{ route('student.login') }}">Back to Login</a> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection



