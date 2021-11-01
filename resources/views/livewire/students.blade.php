<div>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <button class="btn bg-Indigo mr-2" wire:click="OpenAddStudentModal()"><i class="fas fa-plus mr-2"></i>Add student</button>
            <button class="btn bg-Maroon">Reset Student Class Access</button>
          </h3>
        </div>
      <div class="card-body">
        <div class="row mb-3 p-2 ml-3 mt-2">
            <div class="col-md-3">
              <label for="">Search</label>
              <input type="text" class="form-control" wire:model.debounce.350ms="search">
            </div>

            <div class="col-md-2">
              <label for="">Per Page</label>
              <select class="form-control" wire:model="perPage">
                <option value="5">5</option>
                <option value="15">15</option>
                <option value="25">25</option>
              </select>
            </div>
      
            <div class="col-md-2">
              <label for="">Order By</label>
              <select class="form-control" wire:model="orderBy">
                  <option value="created_at">Register Date</option>
              </select>
            </div>
      
            <div class="col-md-2">
              <label for="">Sort By</label>
              <select class="form-control" wire:model="sortBy">
                <option value="asc">ASC</option>
                <option value="desc">DESC</option>
            </select>
            </div>
            
            @if ($selected)
            <div class="col-md-2">
              <a wire:click.prevent="export " class="btn btn-info mt-4"><i class="fas fa-cloud-download-alt mr-2"></i>Download Report</a>
            </div>
            @endif
           
        </div>
       
        <!-- /.card-header -->
        
          <table class="table table-hover">
            <thead class="bg-Navy">
            <tr>
              <th><input type="checkbox" wire:model="selectAll"></th>
              <th>Student ID</th>
              <th>Full Name</th>
              <th>E-email</th>
              <th>Contact</th>
              <th>Contact(Whatsapp)</th>
              <th>School</th>
              <th>Address</th>
              <th>Enroll Course</th>
              <th colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
                @if($students->count())
                @foreach ($students as $student)
                <tr>
                  <td><input type="checkbox" value="{{ $student->id }}" wire:model="selected"></td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->FullName }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->contact_whatsapp }}</td>
                    <td>{{ $student->school }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                      @foreach ($student->courses as $course)
                        <span class="badge bg-indigo mt-2 p-2">{{ $course->Name }}</span>
                      @endforeach
                    </td>
                    
                    <td>
                       <a href="" class="mr-3"><i class="far fa-edit" style="color:#10d430;"></i></a>
                       <a href=""><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
          </table>
       

        @if(count($students))
            {{ $students->links('modals.livewire-pagination-links') }}
        @endif
      </div>
      </div>
    @include('modals.add-stud')
</div>
