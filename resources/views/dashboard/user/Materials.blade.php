@extends('layouts.stud')

@section('content')


<div class="content">
    <div class="row">
        @foreach ($courses as $crs )
        <div class="col-md-4 col-sm-6"> 
            <div class="card shadow mr-3">
                <div class="card-header bg-dark">{{ $crs->Name }}</div>
                <div class="card-body">
                    <img class="card-img-top center" src="{{ asset('assets/img/about.jpg') }}" alt="Card image cap"> 
                <hr>
                    <ul class="list-group">
                    @foreach ($files as $file)
                        @if ($crs->id == $file->course_id)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $file->file_name }}
                        <a href="{{ route('student.stud-download', $file->file_name) }}" class="btn btn-info"><i class="fas fa-cloud-download-alt mr-2"></i>Download</a>
                        </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
   </div>

@endsection