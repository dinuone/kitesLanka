<div class="modal fade addstudent" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true" data-keyboad="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document"">
    <div class=" modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add New Student</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter Student Full Name"
                        wire:model="fullname">
                    <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Date of Birth</label>
                    <input type="date" class="form-control" wire:model="dob">
                    <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" class="form-control" placeholder="Enter student Mobile/Lan line"
                        wire:model="contact">
                    <span class="text-danger">@error('contact') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label>Contact (Whatsapp)</label>
                    <input type="text" class="form-control" wire:model="whatsapp"
                        placeholder="Enter Student Whatsapp Number..">
                    <span class="text-danger">@error('whatsapp') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label>E-mail Address</label>
                    <input type="text" class="form-control" wire:model="email" placeholder="Enter e-mail address..">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <textarea type="text" class="form-control" rows="3" placeholder="Enter Student Home Address"
                        wire:model="address"></textarea>
                    <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                </div>


                <div class="form-group">
                    <label for="">School</label>
                    <input type="text" class="form-control" placeholder="Enter School Name here." wire:model="school">
                    <span class="text-danger">@error('school') {{ $message }} @enderror</span>
                </div>

                @foreach ($courses as $course)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $course->id }}" wire:model="course">
                        <label class="form-check-label">{{ $course->Name }}</label>
                    </div>
                    <span class="text-danger">@error('course') {{ $message }} @enderror</span>
                @endforeach


        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Student</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
