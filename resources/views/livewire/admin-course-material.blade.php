<div>
    <div class="content">
        <div class="container">
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
                <div class="card-header bg-navy"><i class="fas fa-file-alt mr-2"></i>Upload Course Materials</div>
                <div class="card-body">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Select Month</label>
                            <select class="form-control" wire:model="month">
                                <option value="January">JAN</option>
                                <option value="February">FEB</option>
                                <option value="March">MAR</option>
                                <option value="April">APR</option>
                                <option value="May">MAY</option>
                                <option value="June">JUN</option>
                                <option value="July">JUL</option>
                                <option value="August">AUG</option>
                                <option value="Septmeber">SEP</option>
                                <option value="October">OCT</option>
                                <option value="November">NOV</option>
                                <option value="December">DEC</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Course</label>
                            <select class="form-control" wire:model="course">
                                <option value="">--Select Course--</option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->Name }}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select File <small>(PDF,MP4,docs,ppt etc..)</small></label>
                            <input type="file" class="form-control-file" wire:model="material" multiple>
                        </div>
                        <button type="submit" class="btn bg-maroon"><i class="fas fa-cloud-upload-alt mr-2"></i>Upload</button>
                    </form>
                </div>
            </div>
            <div class="card shadow">
                <table id="dataTable" class="table table-hover">
                    <thead class="bg-navy">
                        <tr>
                            <th>Course Name</th>
                            <th>File Name</th>
                            <th>For</th>
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
                            <td>{{ $file->month }}</td>
                            <td>{{ $file->created_at->toDatestring(); }}</td>
                            <td>
                                <a class="mr-2" href=""><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('admin.file-download',$file->file_name) }}" class="btn bg-indigo"><i class="fas fa-cloud-download-alt mr-2"></i>Download</a>
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
    
</div>