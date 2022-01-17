@extends('layouts.teacher')

@section('content')

    <style>
        .pagination {
            justify-content: center
        }

    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('teacher.home') }}">Dashboard</a></li>
            @foreach ($courses as $crs)
                <li class="breadcrumb-item active" aria-current="page">{{ $crs->Name }}</li>
            @endforeach
        </ol>
    </nav>

    <div class="content">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <input type="text" placeholder="Search..." class="form-control" id="search" name="search">

                    </div>
                    <div class="col">
                        @foreach ($courses as $crs)
                            <a href="{{ route('teacher.teacher-payment', $crs->id) }}" class="btn bg-maroon">Clear</a>
                            <input type="hidden" value="{{ $crs->id }}" name="crsid" id="crsid">
                        @endforeach

                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Total Amount :</label>
                            <h3>{{ $amount }}</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Total Students :</label>
                            <h3>{{ $studcount }}</h3>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Full Name</th>
                            <th>Contact</th>
                            <th>Contact Whatsapp</th>
                            <th>School</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $data)
                            <tr>
                                <td>{{ $data->student_id }}</td>
                                <td>{{ $data->student->FullName }}</td>
                                <td>{{ $data->student->email }}</td>
                                <td>{{ $data->student->contact }}</td>
                                <td>{{ $data->student->contact_whatsapp }}</td>
                                <td>{{ $data->student->school }}</td>
                                <td>{{ $data->amount }}</td>
                                <td>
                                    @if ($data->payment_status == 1)
                                        <span class="badge bg-teal p-2">Payment Verified</span>
                                    @else
                                        <span class="badge bg-maroon p-2">Not verified</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $value2 = $('#crsid').val();
            $.ajax({
                type: 'get',
                url: "{{ route('teacher.search') }}",
                data: {
                    'search': $value,
                    'crsid': $value2
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection
