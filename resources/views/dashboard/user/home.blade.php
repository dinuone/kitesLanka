@extends('layouts.stud')

@section('content')
    <style>
        .card-img-top {
            max-width: 250px;
            max-height: 250px;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;

        }

    </style>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1><i class="nav-icon fas fa-bullhorn mr-2"></i>Announcements..</h1>
            </div>
            <div class="body">
                @foreach ($course as $crs)
                    @foreach ($announce as $anc)
                        @foreach ($student as $std)
                            @if ($crs->id == $anc->course_id && $std->payment_status == $anc->payment_status)
                                <div class="alert alert-info alert-dismissible fade show m-2" role="alert">
                                    <strong>{{ $anc->title }} : {{ $anc->course->Name }}</strong>
                                    <br>
                                    {!! $anc->body !!}
                                    <br>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="row">
            @foreach ($avbCourse as $avbcrs)
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-lg">
                                New
                            </div>
                        </div>
                        <div class="card-header bg-indigo">{{ $avbcrs->Name }}</div>
                        <div class="card-body">
                            <img class="card-img-top center" src="{{ asset('storage/' . $avbcrs->image_path) }}"
                                alt="Card image cap">
                            <hr>
                            <a href="{{ route('student-reg-course', $avbcrs->id) }}" class="btn bg-maroon">Register</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
