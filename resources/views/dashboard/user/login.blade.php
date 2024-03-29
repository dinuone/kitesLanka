@extends('layouts.app')

@section('content')

    <style>
        #reg {
            padding-top: 100px;
        }

    </style>

    <section id="reg">
        <div class="container">
            @if (Session::get('success'))
                <div class="alert alert-success" role="alert">
                    Your Student iD:
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endif
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Student</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Teacher</a>
                </li>
            </ul>

            <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col-md-8">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('fail') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card shadow">
                            <div class="card-header text-white" style="background-color: #0095d9">Student Login</div>
                            <div class="card-body">
                                <form action="{{ route('student-check') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Student ID</label>
                                        <input type="text" class="form-control" name="student_id"
                                            value="{{ old('student_id') }}" autofocus>
                                        @error('std_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn text-white"
                                            style="background-color: #0095d9">Login</button>
                                    </div>

                                    <a href="{{ route('student-forget.form') }}">Forgot your Password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col-md-8">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('fail') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card shadow">
                            <div class="card-header text-white" style="background-color: #0095d9">Teacher Login</div>
                            <div class="card-body">
                                <form action="{{ route('teacher.check') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">E-mail</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" autofocus>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn text-white"
                                            style="background-color: #0095d9">Login</button>
                                    </div>

                                    {{-- <a href="{{ route('student-forget.form') }}">Forgot your Password?</a> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>



    </section>

    @include('layouts.footer')

@endsection
