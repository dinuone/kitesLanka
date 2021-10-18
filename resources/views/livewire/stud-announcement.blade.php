<div>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary" wire:click="OpenAnnouncementModal()"><i class="fas fa-bullhorn mr-2"></i>Send Announcement</button>
            <table class="table table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Message Title</th>
                    <th scope="col">Message Text</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Student Payment Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @if($announce->count())
                    @foreach ($announce as $anc )
                    <tr>
                        <td>{{ $anc->id }}</td>
                        <td>{{ $anc->title }}</td>
                        <td>{{ $anc->body }}</td>
                        <td>{{ $anc->course->Name }}</td>
                        <td>
                            @if ($anc->payment_status == 1)
                                <span class="badge badge-success p-2">Payment Done</span>
                            @else
                                <span class="badge badge-warning p-2">Payment Due</span>
                            @endif
                        </td>
                        <td>
                            <a href="" class="mr-3"><i class="far fa-edit" style="color:#10d430;"></i></a>
                            <a href=""><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-danger text-center"><i class="fas fa-exclamation mr-2"></i>No Any Announcement found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>  
    </div>
        @include('modals.add-announcement')      
</div>
