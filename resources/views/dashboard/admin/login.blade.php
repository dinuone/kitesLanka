@extends('layouts.app')

@section('content')
<style>
    #reg{padding-top: 100px;}
    .container{max-width: 800px;}
</style>

<section id="reg">
<div class="container">
    @if (Session::get('fail'))
    <div class="alert alert-danger" role="alert">
        {{ session('fail') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
<div class="card shadow">
    <div class="card-header bg-danger text-white">Admin Login</div>
    <div class="card-body">
        <form action="{{ route('admin.check') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> 
             
              
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="password" value="{{ old('password') }}">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
              <div class="form-group">
                <button type="submit" class="btn btn-danger">Login</button>
              </div>
        </form> 
    </div>
  </div>
  
</div>


</section>




@endsection