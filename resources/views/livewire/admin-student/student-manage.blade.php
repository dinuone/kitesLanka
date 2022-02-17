<div>
    <style>
        .dot {
            height: 10px;
            width: 10px;
            background-color: rgb(231, 5, 5);
            border-radius: 50%;
            display: inline-block;
        }

        .dot2 {
            height: 10px;
            width: 10px;
            background-color: rgb(5, 231, 24);
            border-radius: 50%;
            display: inline-block;
        }

    </style>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn bg-indigo mr-2" wire:click="OpenAddStudentModal()"><i class="fas fa-plus mr-2"></i>Add
                    student</button>
                <button class="btn bg-maroon" wire:click="resetstudStatus()">Reset Student Class Access</button>
            </h3>
        </div>
        <div class="card-body">
            <div class="row mb-3  mt-2">
                <div class="col-md-3">
                    <input type="text" class="form-control" wire:model.debounce.350ms="search" placeholder="search...">
                </div>

                <div class="col-md-2">
                    <select class="form-control" wire:model="filtercourse">
                        <option value="">--Select course--</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->Name }}</option>
                        @endforeach
                    </select>
                </div>



                @if ($selected)
                    <div class="col-md-2">
                        <div class="form-group">
                            <a wire:click.prevent="export " class="btn btn-info"><i
                                    class="fas fa-cloud-download-alt mr-2"></i>Download Report</a>
                        </div>
                    </div>
                @endif
                @if ($selected)
                    <div class="col-md-2">
                        <div class="form-group">
                            <a wire:click="deleteStudents()" class="btn btn-danger"><i
                                    class="fas fa-trash mr-2"></i>Delete</a>
                        </div>
                    </div>
                @endif

            </div>

            <div class="row">
                <div class="col-12">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead class="bg-navy">
                                <th><input type="checkbox" wire:model="selectAll"></th>
                                <th>Student ID</th>
                                <th>Full Name</th>
                                <th>E-email</th>
                                <th>Contact</th>
                                <th>Contact(Whatsapp)</th>
                                <th>School</th>
                                <th>Address</th>
                                <th>Enroll Course</th>
                                <th>Last Seen</th>
                                <th>Status</th>
                                <th colspan="3">Actions</th>
                            </thead>
                            <tbody>
                                @if (count($filterdata))
                                    @foreach ($filterdata as $data)
                                        <tr>
                                            <td><input type="checkbox" value="{{ $data->id }}"
                                                    wire:model="selected"></td>
                                            <td>{{ $data->student_id }}</td>
                                            <td>{{ $data->FullName }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->contact }}</td>
                                            <td>{{ $data->contact_whatsapp }}</td>
                                            <td>{{ $data->school }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>
                                                @foreach ($data->courses as $crs)
                                                    <span class="badge bg-indigo mt-2 p-2">{{ $crs->Name }}</span>
                                                @endforeach
                                            </td>
                                            <td> {{ Carbon\Carbon::parse($data->last_seen)->diffForHumans() }}</td>
                                            <td>
                                                @if (Cache::has('user-is-online' . $data->id))
                                                    <span style="color:#10d430; "><span class="dot2"></span>
                                                        Online
                                                    </span>
                                                @else
                                                    <span style="color:#960b06;"><span class="dot"></span>
                                                        Offline</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a wire:click=" OpenEditStudentModal({{ $data->id }})"
                                                    class="mr-3"><i class="far fa-edit"
                                                        style="color:#10d430;"></i></a>
                                                <a wire:click="deleteStudent({{ $data->id }})"><i
                                                        class="fas fa-trash" style="color:#e70c0c;"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($students as $student)
                                        <tr>
                                            <td><input type="checkbox" value="{{ $student->id }}"
                                                    wire:model="selected"></td>
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
                                            <td> {{ Carbon\Carbon::parse($student->last_seen)->diffForHumans() }}
                                            </td>
                                            <td>
                                                @if (Cache::has('user-is-online' . $student->id))
                                                    <span style="color:#10d430; "><span class="dot2"></span>
                                                        Online
                                                    </span>
                                                @else
                                                    <span style="color:#960b06;"><span class="dot"></span>
                                                        Offline</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a wire:click=" OpenEditStudentModal({{ $student->id }})"
                                                    class="mr-3"><i class="far fa-edit"
                                                        style="color:#10d430;"></i></a>
                                                <a wire:click="deleteStudent({{ $student->id }})"><i
                                                        class="fas fa-trash" style="color:#e70c0c;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        @if (count($students))
            {{ $students->links('modals.livewire-pagination-links') }}
        @endif
    </div>
    @include('modals.edit-student')
    @include('modals.add-stud')
</div>
