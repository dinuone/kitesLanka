<div class="modal fade addlink" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true" data-keyboad="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class=" modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Meeting Link</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <label>Select Payment Month</label>
                    <select class="form-control mb-3" wire:model='month'>
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
                    <span class="text-danger">@error('month') {{ $message }} @enderror</span>

                    <div class="form-group">
                        <label for="">Meeting Link</label>
                        <textarea type="text" class="form-control" wire:model="vdlink" rows="3"></textarea>
                        <span class="text-danger">@error('vdlink') {{ $message }} @enderror</span>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-indigo">Add Link</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
