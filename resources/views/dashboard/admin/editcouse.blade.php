@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            @if ($msg = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $msg }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card-header bg-gray">Edit Course</div>
            <div class="card-body">
                <form action="{{ route('update-course') }}" method="POST" id="fileUploadForm">
                    @csrf
                    @foreach ($info as $data)
                        <input type="hidden" name="course_id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" name="courseName" placeholder="Course Name..."
                                    value="{{ $data->Name }}">
                                <span class="text-danger">@error('courseName') {{ $message }} @enderror</span>
                            </div>
                            <div class="col">
                                <select name="teacherName" class="form-control">
                                    <option value="{{ $data->teacher_id }}">--{{ $data->teacher->fullname }}--
                                    </option>
                                    @foreach ($teachers as $teach)
                                        <option value="{{ $teach->id }}">{{ $teach->fullname }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('teacherName') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <textarea name="description" id="desc" cols="5" rows="10"
                                class="form-control mt-3">{!! $data->description !!}</textarea>
                            <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="text" name="classfee" class="form-control mt-3" placeholder="Class Fee..."
                                    value="{{ $data->class_fee }}">
                                <span class="text-danger">@error('classfee') {{ $message }} @enderror</span>
                            </div>
                            <div class="col mt-3">
                                <input type="file" class="form-control-file" name="photo" required>
                                <span class="text-danger">@error('photo') {{ $message }} @enderror</span>
                                <div class="form-group">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-teal"
                                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Uploaded Image</label> <br>
                                <img src="{{ asset('storage/' . $data->image_path) }} " alt="" style="width: 20%;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button class="btn bg-teal mt-3"><i class="fas fa-plus mr-2"></i>Update Course</button>
                                <a href="{{ route('admin-class') }}" class="btn bg-gray mt-3"><i
                                        class="fas fa-arrow-left mr-2"></i>Back</a>
                            </div>
                        </div>

                    @endforeach

            </div>
            </form>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#desc'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $(function() {
            var path = "{{ route('update-course') }}";
            $(document).ready(function() {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function() {
                        var percentage = '0';
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage + '%', function() {
                            return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function(xhr) {
                        Swal.fire(
                            'Success!',
                            'Updated Course Details!',
                            'success'
                        )
                    }
                });
            });
        });
    </script>



@endsection
