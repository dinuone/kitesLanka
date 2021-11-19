<div>
    <div class="content">
        <div class="row mb-3 ml-3 mt-2">
            <div class="col-md-3">
                <label for="">Course</label>
                <select class="form-control" wire:model="bycourse">
                    <option value="0">Not Selected</option>
                    @foreach ($courses as $crs )
                    <option value="{{ $crs->id }}">{{ $crs->Name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <div class="form-gourp">
                    <label>Start Date</label>
                    <input type="date" class="form-control" wire:model="startDate">
                </div>
            </div>
           <div class="col-md-3">
               <div class="form-group">
                <label>End Date</label>
                <input type="date" class="form-control" wire:model="EndDate">
               </div>
           </div>
           @if ($selected)
           <div class="col-md-2">
               <div class="form-group mt-3">
                <a wire:click.prevent="export " class="btn btn-info mt-3"><i class="fas fa-cloud-download-alt mr-2"></i>Download Report</a>
               </div>
           </div>
          @endif
        </div>
         
          
        
        </div>
        
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover mb-3">
                    <thead class="bg-navy">
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
                        @if($attend->count())
                        @foreach ($attend as $atnd)
                            <tr>
                                <td><input type="checkbox" value="{{ $atnd->id }}" wire:model="selected"></td>
                                <td>{{ $atnd->student->student_id }}</td>
                                <td>{{ $atnd->student->FullName }}</td>
                                <td>{{ $atnd->course->Name }}</td>
                                <td>{{ $atnd->attend }}</td>
                                <td>{{ $atnd->created_at->toDatestring(); }}</td>
                            </tr>   
                        @endforeach
                        @else
                          <td colspan="6" class="text-danger text-center">No any students attendance found</td>
                        @endif
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
    
    
</div>
