<style>
    #photo1 {
        width: 40%;
        height: 30%;
    }

</style>

<div class="modal fade addteacher" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true" data-keyboad="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document"">
      <div class=" modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add New Teacher</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" wire:model="teachername">
                    <span class="text-danger">@error('teachername') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" class="form-control" wire:model="contact">
                    <span class="text-danger">@error('contact') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="text" class="form-control" wire:model="email">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>

                <hr>
                <div class="form-group">
                    <label>Select Image</label>
                    <input type="file" class="form-control-file" wire:model="photo">
                    <span class="text-danger">@error('photo') {{ $message }} @enderror</span>
                    <div wire:loading wire:target="photo">Uploading...</div>
                </div>
                {{-- image preview --}}
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" id="photo1">
                @endif
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-Indigo">Add Teacher </button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
