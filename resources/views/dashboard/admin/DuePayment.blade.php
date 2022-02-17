@extends('layouts.admin')

@section('content')
    <style>
        nav svg {
            max-height: 20px;
        }

    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('receive-payment') }}">Payment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Due Payments</li>
        </ol>
    </nav>
    <div class="content">
        <button class="btn bg-indigo mb-3"><i class="fas fa-cloud-download-alt mr-2"></i>Download</button>
        <div class="card">
            <div class="card-header">
                <h5>Due payments <span class="badge badge-primary badge-lg">{{ $duecount }}</span></h5>
            </div>
            <div class="card-body">
                <table class="table table-hover mb-3">
                    <thead class="bg-navy">
                        <tr>
                            <td>Student ID</td>
                            <td>Full Name</td>
                            <td>Contact</td>
                            <td>Contact(Whatsapp)</td>
                            <td>Payment Status</td>
                            <td>Course</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $std)
                            <tr>
                                <td>{{ $std->student_id }}</td>
                                <td>{{ $std->FullName }}</td>
                                <td>{{ $std->contact }}</td>
                                <td>{{ $std->contact_whatsapp }}</td>
                                <td>
                                    @if ($std->payment_status == 0)
                                        <h5><span class="badge badge-warning">Due Payment</span></h5>
                                    @endif
                                </td>
                                <td>
                                    @foreach ($std->courses as $course)
                                        <span class="badge badge-dark mt-2 p-2">{{ $course->Name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $students->Links() }}
            </div>
        </div>
    </div>
@endsection
