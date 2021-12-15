@extends('layouts.admin')

@section('content')

    <style>
        .container {
            width: 50%;
        }

    </style>
    <div class="container">
        @if (Session::get('change'))
            <div class="alert alert-danger" role="alert">
                {{ session('change') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow">
            <div class="card-header bg-navy">
                <i class="fas fa-user-shield mr-2"></i>Change Password
            </div>
            <div class="card-body">
                <form action="{{ route('admin-changepsw') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="current_password">
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password">
                        @error('confirm_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn bg-maroon" type="submit" name="submit">Change Password</button>
                </form>
            </div>
        </div>
    </div>

@endsection
