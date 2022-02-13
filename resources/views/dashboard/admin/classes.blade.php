@extends('layouts.admin')

@section('content')
    <style>
        .scroll {
            max-height: 400px;
            overflow-y: auto;
        }

        .pagination {
            justify-content: center
        }

    </style>
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    @if ($msg = Session::get('update'))
                        <div class="alert alert-success">
                            <strong>{{ $msg }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-header bg-gray">Add New Course</div>
                    <form action="{{ route('admin-courseSave') }}" method="POST" enctype="multipart/form-data"
                        id="fileUploadForm">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="courseName" placeholder="Course Name..."
                                        required>
                                    <span class="text-danger">@error('courseName') {{ $message }} @enderror</span>
                                </div>
                                <div class="col">
                                    <select name="teacher" class="form-control" required>
                                        <option value="">--Assign Teacher--</option>
                                        @foreach ($teachers as $teach)
                                            <option value="{{ $teach->id }}">{{ $teach->fullname }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('teacher') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>small description</label>
                                <textarea name="description" id="desc" cols="5" rows="10"
                                    class="form-control mt-3"></textarea>
                                <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label>larage description</label>
                                <textarea name="large_description" id="desc_large" cols="5" rows="10"
                                    class="form-control mt-3"></textarea>
                                <span class="text-danger">@error('large_description') {{ $message }} @enderror</span>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input type="text" name="classfee" class="form-control mt-3" placeholder="Class Fee..."
                                        required>
                                    <span class="text-danger">@error('classfee') {{ $message }} @enderror</span>
                                </div>
                                <div class="col">
                                    <input type="text" name="admission_fee" class="form-control mt-3" placeholder="Admission Fee..."
                                        required>
                                    <span class="text-danger">@error('admission_fee') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group mt-3">
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

                            <button class="btn bg-indigo mt-3"><i class="fas fa-plus mr-2"></i>Add Course</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="card scroll">
                    <div class="card-header bg-gray">Courses List & Student Count</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($studcount as $list)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $list->Name }}
                                    <span class="badge bg-maroon badge-pill">
                                        <b>{{ $list->students->count() }}</b>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <table id="example2" class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Teacher</th>
                            <th>Class Fee</th>
                            <th>Description</th>
                            <th>Large Description</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->Name }}</td>
                                <td>{{ $course->teacher->fullname }}</td>
                                <td>{{ $course->class_fee }}</td>
                                <td>{!! $course->description !!}</td>
                                <td>{!! $course->large_desc !!}</td>
                                <td>
                                    <a class="btn bg-teal mr-3" href="{{ route('admin-editcourse', $course->id) }}"><i
                                            class="far fa-edit mr-2" style="color:#ffffff;"></i>Edit</a>

                                </td>
                                <td>

                                    <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                        data-attr="{{ route('delete-course', $course->id) }}" title="Delete Project"
                                        class="btn bg-maroon">
                                        <i class="fas fa-trash mr-2" style="color: white;"></i>Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $courses->links() }}
        </div>
        <!-- small modal -->
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Warning!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="smallBody">
                        <div>
                            <b>
                                <p>Are you Sure?</p>
                            </b>

                            <form action="{{ route('delete-course', $course->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn bg-maroon mr-3" type="submit">Yes Delete</button>
                                <button type="button" data-dismiss="modal" class="btn bg-gray">No</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
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

            ClassicEditor
            .create(document.querySelector('#desc_large'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $(function() {
            var path = "{{ route('admin-courseSave') }}";
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
                            'New Course Created!',
                            'success'
                        )
                    }
                });
            });
        });
    </script>
    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });


    @endsection
