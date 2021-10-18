@extends('layouts.admin')


@section('content')
<div class="content">
    <div class="card shadow">
    <div class="card-header bg-info"><i class="fas fa-clipboard-list mr-2"></i>Student Attendance Detials</div>
    <div class="card-body">
        <table class="table table-hover mb-3">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Attend</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attend as $atd )
                    <tr>
                        <td>{{ $atd->student->student_id}}</td>
                        <td>{{ $atd->student->FullName }}</td>
                        <td>{{ $atd->course->Name }}</td>
                        <td>{{ $atd->attend }}</td>
                        <td>{{ $atd->created_at->toDatestring(); }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection