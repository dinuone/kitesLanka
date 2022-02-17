<div>
    <div class="content">
        <div class="row">
            @foreach ($courses as $crs)
                <div class="col-md-4 col-sm-6">
                    <div class="card shadow">
                        <div class="card-header bg-indigo">{{ $crs->Name }}</div>
                        <div class="card-body">
                            <img class="card-img-top center" src="{{ asset('storage/' . $crs->image_path) }}"
                                alt="Card image cap">
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <button class="btn bg-maroon"
                                        wire:click="OpenClassLinkModal({{ $crs->id }})"><i
                                            class="fas fa-link mr-2"></i>Class Link</button>
                                </div>
                                <div class="col">
                                    <button class="btn bg-dark" wire:click="OpenRecLinkModal({{ $crs->id }})"><i
                                            class="fas fa-video mr-2"></i>Recording Link</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('modals.stud-classLink')
    @include('modals.reclink-Stud')
</div>
