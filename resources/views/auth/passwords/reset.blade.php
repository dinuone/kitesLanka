@extends('layouts.app')

@section('content')

    <style>
        #frm {
            padding-top: 100px;
        }

    </style>

    <div class="container" id="frm">
        <div class="card shadow">
            <div class="card-header bg-info" style="color: white">Reset Your Password</div>
            <div class="card-body">
                <form class="form" role="form" autocomplete="off" action="{{ route('student-reset.password') }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your E-mail Address"
                            value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordOld">New Password</label>
                        <input type="password" class="form-control" id="inputPasswordOld" required="" name="password">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordNew">Confirm your Password</label>
                            <input type="password" class="form-control" id="inputPasswordNew" required=""
                                name="password_confirmation">

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg float-right">Reset Passsword</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        @include('layouts.footer')
    @endsection
