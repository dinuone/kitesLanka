@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card shadow">
            <table id="dataTable" class="table table-hover">
                <thead class="bg-navy">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>email</th>
                        <th style="width: 400px;">Feedback Message</th>
                        <th>Sent Date</th>
                        <th>Assign to (Dev)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feedbacks as $data )
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->st_fullname}}</td>
                            <td>{{ $data->st_email }}</td>
                            <td style="width: 400px;">{{ $data->feedback }}</td>
                            <td>{{ $data->created_at->toDatestring() }}</td>
                            <td><button class="btn bg-gray" data-toggle="tooltip" data-placement="right" title="Comming soon..."><i class="fas fa-paper-plane mr-2"></i>Send</button></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-danger text-center">Not any Feedbacks found!</td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
            {{ $feedbacks->links() }}
        </div>
        <p class="text-danger">Send button is available in future version....</p>
        <p style="color:#949494 "> <b>Hint:</b> if you want to assign students feedbacks notes to devloper then just click on the send button.. it will automatically send
            email to developer... </p>
    </div>
@endsection