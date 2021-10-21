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
        <form wire:submit.prevent="update" enctype="multipart/form-data">
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

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Course</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>