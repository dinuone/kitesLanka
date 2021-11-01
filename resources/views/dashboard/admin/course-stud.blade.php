@extends('layouts.admin')

@section('content')

<a href="{{ route('admin.avb-course') }}" class="btn bg-maroon mt-3 mb-2 ml-3"><i class="fas fa-arrow-left mr-2"></i>Back</a>
<div class="content">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="bg-navy">
                    <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>E-email</th>
                        <th>Contact</th>
                        <th>Contact(Whatsapp)</th>
                        <th>School</th>
                        <th>Address</th>
                        <th>Enroll Course</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $stud )
                        <tr>
                            <td>{{ $stud->student_id }}</td>
                            <td>{{ $stud->FullName }}</td>
                            <td>{{ $stud->email}}</td>
                            <td>{{ $stud->contact }}</td>
                            <td>{{ $stud->contact_whatsapp }}</td>
                            <td>{{ $stud->school }}</td>
                            <td>{{ $stud->address }}</td>
                            @foreach ($selectcourse as $crs)
                                <td>{{ $crs->Name }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection