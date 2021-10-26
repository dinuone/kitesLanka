<style>
  #photo1{width: 40%; height: 30%;}
</style>

<div class="modal fade editcourse" wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
aria-hidden="true" data-keyboad="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document"">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Course Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="update">
          <div class="form-group">
            <label for="">Course Name</label>
            <input type="text" class="form-control" wire:model="up_name">
            <span class="text-danger">@error('up_name') {{ $message }} @enderror</span>
          </div>
          
          <div class="form-group">
            <label for="">Description</label>
            <textarea type="text" class="form-control" rows="5" placeholder="Enter Course Description.." wire:model="up_description" ></textarea>
            <span class="text-danger">@error('up_description')  {{ $message }} @enderror</span>
          </div>

          <label>Select Teacher</label>
          <select class="form-control mb-3" wire:model="up_teacher">
            <option value="">No Selected</option>
            @foreach ($teachers as $teacher)
              <option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
            @endforeach
          </select>

          <div class="form-group">
            <label>Select Image</label>
            <input type="file" class="form-control-file" wire:model="up_photo" id="photo1">
            <span class="text-danger">@error('photo')  {{ $message }} @enderror</span>
            <div wire:loading wire:target="photo">Uploading...</div>
          </div>  
            {{-- image preview --}}
            @if ($photo)
              <img src="{{ $photo->temporaryUrl() }}" id="photo1">
            @endif  

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-indigo">Update Course</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>