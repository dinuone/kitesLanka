@extends('layouts.teacher')

@section('content')
    <div class="content">
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-header">{{ $course->Name }}</div>
                        <div class="card-body">
                            <img class="card-img-top center" src="{{ asset('storage/' . $course->image_path) }}"
                                alt="Card image cap">
                            <hr>
                            <h5>Student Count : <span class="badge badge-dark">{{ $course->students->count() }}</span></h5>
                            <a href="{{ route('teacher.classtud', $course->id) }}" class="btn bg-maroon">More
                                info</i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>

@endsection
