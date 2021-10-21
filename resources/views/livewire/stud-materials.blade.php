<div>
    <div class="container">
        <div class="row">
            @foreach ($courses as $crs )
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-indigo">{{ $crs->Name }}</div>
                    <div class="card-body">
                        <img src="{{ asset('storage/'.$crs->image_path) }}" alt="" class="card-img-top center">
                        <hr>
                        <button class="btn bg-maroon" wire:click="OpenViewCourse({{ $crs->id }})">Course Materials</button>
                    </div>
                </div>
            </div>  
            @endforeach
        </div>
    </div>
    @include('modals.view-materials')
</div>
