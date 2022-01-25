<style>
    #imgrc {
        width: 50%;
        height: 25%;
    }

    p {
        text-align: center;
    }

</style>

<div class="modal fade viewrecipt" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true" data-keyboad="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl role=" document"">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Recipt</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="access">
                    @foreach ($payment_imgs as $img)
                        <p>
                            <img src=" {{ asset('storage/' . $img->image_path) }} " alt="recipt img" id="imgrc">
                        </p>

                    @endforeach

            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-indigo">Give Access</button>
            </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
