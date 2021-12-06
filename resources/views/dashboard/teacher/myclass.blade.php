@extends('layouts.teacher')

@section('content')

    <div class="content">
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-3">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ $course->students->count() }}</h3>
                            <h2>{{ $course->Name }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('teacher.classtud', $course->id) }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
