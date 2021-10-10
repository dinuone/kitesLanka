<style>
    #photo1{width: 40%; height: 30%;}
  </style>
  <div class="modal fade editpayment" wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" 
  aria-hidden="true" data-keyboad="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document"">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Payment Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <form wire:submit.prevent="update" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Student Name: </label>
                    @foreach ($paymentStatus as $data)
                     <input type="text"  class="form-control" readonly value="{{ $data->student->FullName }}">
                    @endforeach
                  </div>
                  <div class="form-group">
                      <label for="">Student ID : </label>
                      <input type="text"  class="form-control" wire:model="up_stid" readonly>
                  </div>
                  <div class="form-group">
                    <label>Amount :</label>
                    <input type="text"  class="form-control" wire:model="up_amount">
                    <span class="text-danger">@error('up_amount') {{ $message }} @enderror</span>
                  </div>
                  <div class="form-group">
                   @foreach ($paymentStatus as $data)
                     @if ($data->payment_status == 1)
                     <label>Payment Status : Verified</label> 
                     @else
                     <label>Payment Status : Not Verified</label>
                     @endif
                   @endforeach 
                   
                   <select class="form-control mb-3" wire:model="up_status">
                      <option value="1">Verified</option>
                      <option value="0">Cancel Verification</option>
                    </select>
                    <span class="text-danger">@error('up_status') {{ $message }} @enderror</span>
                  </div> 
                  
                  <label for="">Select Course</label>  
                    <select class="form-control mb-3" wire:model="up_course">
                      @foreach ($crs as $course)
                      <option value="{{ $course->id }}">{{ $course->Name }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">@error('up_course') {{ $message }} @enderror</span>
                <hr>
                  <div class="form-group">
                    <label>Reference Number</label>
                    <input type="text" class="form-control" wire:model="up_ref">
                    <span class="text-danger">@error('up_ref') {{ $message }} @enderror</span>
                  </div>  
            </div>
  
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
          
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>