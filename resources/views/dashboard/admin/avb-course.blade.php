@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="row">
        @foreach ($courses as $course)
        <div class="col">
            <div class="card">
                <div class="card-header bg-indigo"><strong>{{ $course->Name }}</strong></div>
                <div class="card-body">
                    <h5>Student Count :</h5>
                    <h1><span class="badge bg-maroon">{{ $course->students->count() }}</span></h1>
                    <a href="{{ route('admin.course-stud',$course->id) }}" class="float-right">More Info</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection