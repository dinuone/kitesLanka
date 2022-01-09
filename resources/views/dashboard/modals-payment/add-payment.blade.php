<style>
    #photo1 {
        width: 40%;
        height: 30%;
    }

</style>
<div class="modal fade addpayment" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true" data-keyboad="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document"">
    <div class="                 modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Class Fees</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Full Name : </label>
                    <input type="text" class="form-control" wire:model="fullname" readonly>
                </div>
                <div class="form-group">
                    <label for="">Student ID : </label>
                    <input type="text" class="form-control" wire:model="student_id" readonly>
                </div>
                <div class="form-group">
                    <label>Amount :</label>
                    <input type="text" class="form-control" placeholder="Enter paid amount here.."
                        wire:model="amount">
                    <span class="text-danger">@error('amount') {{ $message }} @enderror</span>
                </div>
                <label>Select Course</label>
                <select class="form-control mb-3" wire:model='course'>
                    <option value="">--Not Selected--</option>
                    @foreach ($courses as $data)
                        <option value="{{ $data->id }}">{{ $data->Name }}</option>
                    @endforeach
                </select>

                <label>Select Payment Month</label>
                <select class="form-control mb-3" wire:model='month'>
                    <option value="">-- Not selected --</option>
                    <option value="January">JAN</option>
                    <option value="February">FEB</option>
                    <option value="March">MAR</option>
                    <option value="April">APR</option>
                    <option value="May">MAY</option>
                    <option value="June">JUN</option>
                    <option value="July">JUL</option>
                    <option value="August">AUG</option>
                    <option value="Septmeber">SEP</option>
                    <option value="October">OCT</option>
                    <option value="November">NOV</option>
                    <option value="December">DEC</option>
                </select>


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
            <button type="submit" class="btn bg-indigo">Click to Pay</button>
        </div>
        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
