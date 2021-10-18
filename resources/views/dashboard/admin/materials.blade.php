@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container">
        @if ($msg = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $msg }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
        </div>
         @endif

         @if (count($errors) > 0)
       <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            {{ $error }}
             @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
        </div>
        @endif
        
        <div class="card shadow">
            <div class="card-header bg-info"><i class="fas fa-file-alt mr-2"></i>Upload Course Materials</div>
            <div class="card-body">
                <form action="{{ route('admin.file-upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Select Course</label>
                        <select class="form-control" name="course">
                            <option value="">--Select Course--</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->Name }}</option>
                            @endforeach
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select File <small>(PDF,MP4,docs,ppt etc..)</small></label>
                        <input type="file" class="form-control-file" name="file">
                    </div>
                    <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-cloud-upload-alt mr-2"></i>Upload</button>
                </form>
            </div>
        </div>
        <div class="card shadow">
            <table id="dataTable" class="table table-hover">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>File Name</th>
                        <th>Upload Date</th>
                        <th>Action</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($files as $file )
                    <tr>
                        <td>{{ $file->course->Name }}c</td>
                        <td><i class="fas fa-file-pdf mr-2"></i>{{ $file->file_name }}</td>
                        <td>{{ $file->created_at->toDatestring(); }}</td>
                        <td>
                            <a class="mr-2" href=""><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.file-download', $file->file_name) }}" class="btn btn-info"><i class="fas fa-cloud-download-alt mr-2"></i>Download</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-danger text-center">Not any course materials found!</td>
                    </tr>
                        
                    @endforelse
                   
                </tbody>
            </table>
        </div>
    </div>  
</div>

@endsection

