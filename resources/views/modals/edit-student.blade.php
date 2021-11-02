<div class="modal fade editstudent" wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
aria-hidden="true" data-keyboad="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document"">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Student Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="update" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter Student Full Name" wire:model="up_fullname">
            <span class="text-danger">@error('up_fullname') {{ $message }} @enderror</span>
          </div>

          <div class="form-group">
            <label for="">Date of Birth</label>
            <input type="date" class="form-control" wire:model="up_dob" ></input>
            <span class="text-danger">@error('up_dob')  {{ $message }} @enderror</span>
          </div>

          <div class="form-group">
            <label for="">Contact</label>
            <input type="text" class="form-control" placeholder="Enter student Mobile/Lan line" wire:model="up_contact">
            <span class="text-danger">@error('up_contact')  {{ $message }} @enderror</span>
          </div>

          <div class="form-group">
            <label>Contact (Whatsapp)</label>
            <input type="text" class="form-control" wire:model="up_whatsapp" placeholder="Enter Student Whatsapp Number..">
            <span class="text-danger">@error('up_whatsapp')  {{ $message }} @enderror</span>
          </div>

          <div class="form-group">
            <label>E-mail Address</label>
            <input type="text" class="form-control" wire:model="up_email" placeholder="Enter e-mail address..">
            <span class="text-danger">@error('up_email')  {{ $message }} @enderror</span>
          </div>

          <div class="form-group">
            <label for="">Address</label>
            <textarea type="text" class="form-control" rows="3"placeholder="Enter Student Home Address" wire:model="up_address" ></textarea>
            <span class="text-danger">@error('up_address')  {{ $message }} @enderror</span>
          </div>


          <div class="form-group">
            <label for="">School</label>
            <input type="text" class="form-control" placeholder="Enter School Name here." wire:model="up_school">
            <span class="text-danger">@error('up_school')  {{ $message }} @enderror</span>
          </div>

          @foreach ($courses as $course)
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $course->id }}" wire:model="up_course" >
            <label class="form-check-label">{{ $course->Name }}</label>
          </div>
          <span class="text-danger">@error('up_course')  {{ $message }} @enderror</span>
          @endforeach
        
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-indigo">Update</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>