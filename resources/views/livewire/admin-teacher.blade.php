
<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <button class="btn bg-indigo" wire:click="OpenAddTeacherModal()"><i class="fas fa-plus mr-2"></i>Add Teacher</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Search</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="">Per Page</label>
                    <select class="form-control">
                      <option value="5">5</option>
                      <option value="15">15</option>
                      <option value="25">25</option>
                    </select>
                  </div>
            
                  <div class="col-md-2">
                    <label for="">Order By</label>
                    <select class="form-control">
                        <option value="FullName">Student Name</option>
                        <option value="created_at">Register Date</option>
                    </select>
                  </div>
            
                  <div class="col-md-2">
                    <label for="">Sort By</label>
                    <select class="form-control">
                      <option value="asc">ASC</option>
                      <option value="desc">DESC</option>
                    </select>
                  </div>

                  <div class="col-md-2">
                      <button class="btn bg-indigo mt-4"><i class="fas fa-cloud-download-alt mr-2"></i>Download</button>
                  </div>
            </div>

            <table class="table tbale-hover">
                <thead class="bg-navy">
                    <tr>
                        <th><input type="checkbox" class="form-check"></th>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Contact</th>
                        <th>E-mail</th>
                        <th>Register Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td></td>
                            <td>{{ $teacher->id }}</td> 
                            <td>{{ $teacher->fullname }}</td> 
                            <td>{{ $teacher->contact }}</td> 
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->created_at->toDatestring(); }}</td>
                            <td>
                                <a class="mr-3" wire:click="EditTeacherModal({{ $teacher->id }})"><i class="far fa-edit" style="color:#10d430;"></i></a>
                                <a wire:click="DeleteTeacher({{ $teacher->id }})"><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('modals.add-teach')
    @include('modals.edit-teacher')
</div>



