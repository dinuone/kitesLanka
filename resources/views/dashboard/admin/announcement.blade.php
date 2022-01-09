@extends('layouts.admin')

@section('content')
    <style>
        .pagination {
            justify-content: center
        }

    </style>

    <div class="content">
        <div class="container">
            @if (Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('store-announce') }}">
                        @csrf
                        <label for="">Select Course</label>
                        <select class="form-control mb-3" name="course">
                            <option value="">No Selected</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->Name }}</option>
                            @endforeach
                        </select>
                        <label>Select Student Payment</label>
                        <select class="form-control mb-3" name="payment">
                            <option value="">No Selected</option>
                            <option value="1">Payment Done</option>
                            <option value="0">Payment Due</option>
                        </select>
                        <span class="text-danger">@error('course') {{ $message }} @enderror</span>

                        <hr>

                        <div class="form-group">
                            <label for="">Message Title</label>
                            <input type="text" class="form-control" name="title">
                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="">Message Body</label>
                            <textarea type="text" class="form-control" rows="6"
                                placeholder="Type your announcement here...." name="msg" id="msg"></textarea>
                            <span class="text-danger">@error('msg') {{ $message }} @enderror</span>
                        </div>

                        <button type="submit" class="btn bg-indigo"><i class="fas fa-paper-plane mr-2"></i>Send</button>
                </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="card shadow">
                @if (Session::get('delete'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Message Title</th>
                                <th scope="col" style="width: 200px;">Message Text</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($announce->count())
                                @foreach ($announce as $anc)
                                    <tr>
                                        <td>{{ $anc->id }}</td>
                                        <td>{{ $anc->title }}</td>
                                        <td>{!! $anc->body !!}</td>
                                        <td><span class="badge bg-gray p-2"> {{ $anc->course->Name }}</span></td>
                                        <td>
                                            @if ($anc->payment_status == 1)
                                                <span class="badge badge-success p-2">Payment Done</span>
                                            @else
                                                <span class="badge badge-warning p-2">Payment Due</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('announce-delete', $anc->id) }}" class="btn btn-danger"><i
                                                    class="fas fa-trash mr-2" style="color:white;"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-danger text-center"><i
                                            class="fas fa-exclamation mr-2"></i>No
                                        Any Announcement found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $announce->links() }}
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#msg'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
