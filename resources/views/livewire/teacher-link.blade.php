<div>
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header">{{ $course->Name }}</div>
                    <div class="card-body">
                        <img class="card-img-top center" src="{{ asset('storage/' . $course->image_path) }}"
                            alt="Card image cap">
                        <hr>
                        <button class="btn bg-maroon" wire:click="OpenAddLinkModal({{ $course->id }})">Add Class
                            Link</button>
                    </div>
                    <div class="card-body">
                        <label>Month:</label>
                        <span class="badge badge-primary p-2">{{ $course->month }}</span>
                        <div class="form-group">
                            <label>Class Link</label>
                            <input type="text" class="form-control" value="{{ $course->Links }}" readonly>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('modals.add-link')
</div>
