@extends('layouts.teacher')

@section('content')
<div class="content">
    <a class="btn bg-indigo mb-3" href="{{ route('teacher.myclass') }}"><i class="fas fa-arrow-left mr-2"></i>Back</a>
    <div class="card shadow">
        <div class="card-body">
            <table id="dataTable" class="table table-hover">
                <thead class="bg-navy">
                    <tr>
                        <td>Student ID</td>
                        <td>Full Name</td>
                        <td>Contact</td>
                        <td>Contact (Whatsapp)</td>
                        <td>Address</td>
                        <td>School</td>
                        <td>Register Date</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $stud)
                    <tr>
                        <td>{{ $stud->student_id }}</td>
                        <td>{{ $stud->FullName }}</td>
                        <td>{{ $stud->contact }}</td>
                        <td>{{ $stud->contact_whatsapp }}</td>
                        <td>{{ $stud->address }}</td>
                        <td>{{ $stud->school }}</td>
                        <td>{{ $stud->created_at->toDatestring() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
  

@endsection