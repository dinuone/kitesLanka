
<div class="content">
    <div class="row mb-3 ml-3 mt-2">
        <div class="col-md-3">
            <label for="">Course</label>
            <select class="form-control" wire:model="bycourse">
                @foreach ($courses as $crs )
                <option value="{{ $crs->id }}">{{ $crs->Name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <div class="form-gourp">
                <label>Start Date</label>
                <input type="date" class="form-control" wire:model="startDate">
            </div>
        </div>
       <div class="col">
           <div class="fotm-group">
            <label>End Date</label>
            <input type="date" class="form-control" wire:model="EndDate">
           </div>
       </div>
       @if ($selected)
        <div class="col-md-2">
            <a wire:click.prevent="export " class="btn btn-info mt-4"><i class="fas fa-cloud-download-alt mr-2"></i>Download Report</a>
        </div>
       @endif
      
    
    </div>
    
    <div class="card shadow">
    <div class="card-header bg-info"><i class="fas fa-clipboard-list mr-2"></i>Student Attendance Detials</div>
    <div class="card-body">
        <table class="table table-hover mb-3">
            <thead>
                <tr>
                    <th><input type="checkbox" wire:model="selectAll"></th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Attend</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attend as $atd )
                    <tr>
                        <td><input type="checkbox" value="{{ $atd->id }}" wire:model="selected"></td>
                        <td>{{ $atd->student->student_id}}</td>
                        <td>{{ $atd->student->FullName }}</td>
                        <td>{{ $atd->course->Name }}</td>
                        <td>{{ $atd->attend }}</td>
                        <td>{{ $atd->created_at->toDatestring(); }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

