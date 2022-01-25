<div>
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4 col-sm-6">
                <div class="card shadow">
                    <div class="card-header"><b>{{ $course->Name }}</b></div>
                    <div class="card-body">
                        <input type="text" class="form-control mb-3" readonly value="{{ $course->month }}">
                        <input type="text" class="form-control" readonly value="{{ $course->Links }}">
                        <hr>
                        <div class="row">
                            <div class="col">
                                <button class="btn bg-Indigo" wire:click="OpenAddLinkModal({{ $course->id }})"><i
                                        class="fas fa-plus mr-2"></i>Add Meeting Link</button>
                            </div>
                            @if ($course->Links)
                                <div class="col">
                                    <button class="btn bg-maroon ml-3"
                                        wire:click="DeleteCourseLink({{ $course->id }})"><i
                                            class="fas fa-trash mr-2"></i>Delete Link</button>
                                </div>
                            @endif

                        </div>
                        <hr>
                        <input type="text" class="form-control mb-3" readonly
                            value="{{ $course->record_link_month }}">
                        <input type="text" class="form-control" readonly value="{{ $course->record_link }}">
                        <div class="row mt-3">
                            <div class="col">
                                <button class="btn bg-navy" wire:click="OpenRecLink({{ $course->id }})"><i
                                        class="fas fa-video mr-2"></i>Recording Link</button>
                            </div>
                            @if ($course->record_link)
                                <div class="col">
                                    <button class="btn bg-maroon ml-3"
                                        wire:click="DeleteRecLink({{ $course->id }})"><i
                                            class="fas fa-trash mr-2"></i>Delete
                                        Link</button>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('modals.add-link')
    @include('modals.add-Reclink')
</div>
