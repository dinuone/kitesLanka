@extends('layouts.admin')

@section('content')
  <div class="content">
    <div class="card shadow">
        <div class="card-header bg-info">Today Registered Students List</div>
        <div class="card-body">
            <table class="table table-hover mt-3">
                <thead class="shadow">
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>E-email</th>
                    <th>Contact</th>
                    <th>Contact(Whatsapp)</th>
                    <th>School</th>
                    <th>Address</th>
                    <th>Enroll Course</th>
                    <th colspan="3">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($studlist as $std )
                   <tr>
                       <td>{{ $std->student_id }}</td>
                       <td>{{ $std->FullName }}</td>
                       <td>{{ $std->email }}</td>
                       <td>{{ $std->contact }}</td>
                       <td>{{ $std->contact_whatsapp }}</td>
                       <td>{{ $std->school }}</td>
                       <td>{{ $std->address }}</td>
                       <td>  
                      @foreach ($std->courses as $course)
                        <span class="badge badge-info mt-2 p-2">{{ $course->Name }}</span>
                      @endforeach
                    </td>
                    <td>
                        <a href="" class="mr-3"><i class="far fa-edit" style="color:#10d430;"></i></a>
                        <a href=""><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
                     </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>  
    </div>
  </div>
@endsection