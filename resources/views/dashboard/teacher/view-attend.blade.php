@extends('layouts.teacher')

@section('content')
    <div class="content">
        <div class="card">
            @foreach ($attend as $data)
                <div class="card-header bg-indigo text-white">Student Name : {{ $data->student->FullName }}</div>
            @endforeach
            <div class="card-body">
                <table id="dataTable" class="table table-hover">
                    <thead class="bg-navy">
                        <tr>
                            <td>Student ID</td>
                            <td>Full Name</td>
                            <td>Contact</td>
                            <td>Contact (Whatsapp)</td>
                            <td>Course</td>
                            <td>Attend Date</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attend as $data)
                            <tr>
                                <td>{{ $data->student->student_id }}</td>
                                <td>{{ $data->student->FullName }}</td>
                                <td>{{ $data->student->contact }}</td>
                                <td>{{ $data->student->contact_whatsapp }}</td>
                                <td>{{ $data->course->Name }}</td>
                                <td>{{ $data->created_at->toDatestring() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
