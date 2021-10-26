<div>
    <div class="card shadow">   
        <div class="card-body">
            <button class="btn bg-Indigo" wire:click="OpenAddCourseModal()"><i class="fas fa-plus mr-2"></i>Add New Course</button>
            <table id="example2" class="table table-hover mt-3">
             <thead>
             <tr>
               <th>Course ID</th>
               <th>Course Name</th>
               <th>Teacher</th>
               <th>Actions</th>
             </tr>
             </thead>
             <tbody>
                @if($courses->count())
                @foreach ($courses as $course )
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->Name }}</td>
                    <td>{{ $course->teacher->fullname }}</td>
                    <td>
                        <a class="mr-3" wire:click="OpenEditCourseModal({{ $course->id }})"><i class="far fa-edit" style="color:#10d430;"></i></a>
                        <a href=""><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
             </tbody>
           </table>
        </div>
        @if(count($courses))
            {{ $courses->links('modals.livewire-pagination-links') }}
        @endif
    </div>
    @include('modals.add-course')
    @include('modals.edit-course')
   
</div>
