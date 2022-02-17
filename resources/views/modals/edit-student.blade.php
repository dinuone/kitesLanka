<div class="modal fade editstudent" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true" data-keyboad="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class=" modal-content">
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
                        <input type="text" class="form-control" placeholder="Enter Student Full Name"
                            wire:model="upfullname">
                        <span class="text-danger">@error('upfullname') {{ 'full name required' }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" class="form-control" wire:model="updob">
                        <span class="text-danger">@error('updob') {{ 'Dob required' }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" class="form-control" placeholder="Enter student Mobile/Lan line"
                            wire:model="upcontact">
                        <span class="text-danger">@error('upcontact') {{ 'contact number required' }}
                            @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>Contact (Whatsapp)</label>
                        <input type="text" class="form-control" wire:model="upwhatsapp"
                            placeholder="Enter Student Whatsapp Number..">
                        <span class="text-danger">@error('upwhatsapp') {{ 'whatapp number required' }}
                            @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>E-mail Address</label>
                        <input type="text" class="form-control" wire:model="upemail"
                            placeholder="Enter e-mail address..">
                        <span class="text-danger">@error('upemail') {{ 'email required' }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea type="text" class="form-control" rows="3" placeholder="Enter Student Home Address"
                            wire:model="upaddress"></textarea>
                        <span class="text-danger">@error('upaddress') {{ 'address required' }} @enderror</span>
                    </div>


                    <div class="form-group">
                        <label for="">School</label>
                        <input type="text" class="form-control" placeholder="Enter School Name here."
                            wire:model="upschool">

                    </div>

                    @foreach ($courses as $course)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $course->id }}"
                                wire:model="upcourse">
                            <label class="form-check-label">{{ $course->Name }}</label>
                        </div>
                        <span class="text-danger">@error('upcourse') {{ 'course required' }} @enderror</span>
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
