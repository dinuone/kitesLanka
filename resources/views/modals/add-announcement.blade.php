<div class="modal fade addannouncement" wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
aria-hidden="true" data-keyboad="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document"">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create Announcement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form wire:submit.prevent="save"> 
      <div class="modal-body">
          <label for="">Select Course</label>  
          <select class="form-control mb-3" wire:model="course">
            <option value="">No Selected</option>
            @foreach ($courses as $course)
              <option value="{{ $course->id }}">{{ $course->Name }}</option>
            @endforeach
          </select>
          <label>Select Student Payment</label>
          <select class="form-control mb-3" wire:model="payment">
            <option value="">No Selected</option>
            <option value="1">Payment Done</option>
            <option value="0">Payment Due</option>
          </select>
          <span class="text-danger">@error('course') {{ $message }} @enderror</span>

          <hr>
        
          <span class="text-danger">@error('studpayment') {{ $message }} @enderror</span>

            <div class="form-group">
              <label for="">Message Title</label>
              <input type="text" class="form-control" wire:model="title">
              <span class="text-danger">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
              <label for="">Message Body</label>
              <textarea type="text" class="form-control" rows="6"placeholder="Type your announcement here...." wire:model="msg" ></textarea>
              <span class="text-danger">@error('msg')  {{ $message }} @enderror</span>
            </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-Indigo"><i class="fas fa-paper-plane mr-2"></i>Send</button>
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>   {{-- model end --}}
