<div class="modal fade classLink" wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
aria-hidden="true" data-keyboad="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document"">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Your Class Link</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
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
            <label for="">Class Link</label>
            @forelse ($payments as $payment)
            <div class="card-body shadow">
              <a href="{{ $payment->course->Links }}" wire:click="markattend()" target="_blank">Join to class</a>
            </div>
            @empty
            <div class="alert alert-danger" role="alert">
                Your Payment is not verified!
            </div> 
            @endforelse
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>