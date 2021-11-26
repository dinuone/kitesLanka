<style>
    #imgrc {
        width: 80%;
        height: 40%;
    }

    p {
        text-align: center;
    }

</style>

<div class="modal fade viewmaterial" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true" data-keyboad="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl role=" document"">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Course Materials</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <td>Course Name</td>
                            <td>Date</td>
                            <td>File Name</td>
                            <td>Download</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($paymentdone as $pyment )
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->course->Name }}</td>
                                    <td>{{ $file->created_at->toDatestring() }}</td>
                                    <td>{{ $file->file_name }}</td>
                                    <td><a href="{{ route('student-stud-download', $file->file_name) }}"
                                            class="btn bg-indigo"><i
                                                class="fas fa-cloud-download-alt mr-2"></i>Download</a></td>
                                </tr>
                            @endforeach
                        @empty

                            <h5 class="text-danger text-center"><strong><i
                                        class="fas fa-exclamation-triangle mr-2"></i>You have to pay your class fee
                                    first</strong></h5>

                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
