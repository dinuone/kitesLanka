@extends('layouts.app')

@section('content')
    <style>
        #reg {
            padding-top: 100px;
        }

        #crs {
            margin-bottom: -10px;
        }

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
                <div class="card-header bg-secondary text-white">Student Registration </div>
                <div class="card-body">
                    <form action="{{ route('student-create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course" value="{{ $courseid }}">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}"
                                        autofocus>
                                    @error('fullname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Whatsapp Number</label>
                                    <input type="text" name="contact1" class="form-control"
                                        placeholder="Ex:- 070 - XXX-XX-XX" value="{{ old('contact1') }}">
                                    @error('contact1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact2" class="form-control"
                                        placeholder="Ex:- 070 - XXX-XX-XX" value="{{ old('contact2') }}">
                                    @error('contact2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address"
                                value="{{ old('address') }}"></textarea>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Ex:- someone@email.com" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>School <strong>(only if you are still in school)</strong></label>
                                    <input type="text" name="school" class="form-control" value="{{ old('school') }}">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Passowrd</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Enter your new password here..">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm your passowrd...">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </section>


    @include('layouts.footer')

@endsection
