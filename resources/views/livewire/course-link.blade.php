<div>
    <div class="row">
        @foreach ($courses as $course)
        <div class="col-md-4 col-sm-6">
            <div class="card shadow">
                <div class="card-header"><b>{{ $course->Name }}</b></div>
                <div class="card-body">           
                    <input type="text" class="form-control" readonly value="{{ $course->Links}}">          
                    <hr>
                    <button class="btn bg-Indigo" wire:click="OpenAddLinkModal({{ $course->id }})"><i class="fas fa-plus mr-2"></i>Add Meeting Link</button>
                    <button class="btn bg-maroon ml-3" wire:click="DeleteCourseLink({{ $course->id }})"><i class="fas fa-trash mr-2"></i>Delete Link</button>
                </div>
            </div>
        </div> 
        @endforeach
    </div>

    @include('modals.add-link')
</div>
