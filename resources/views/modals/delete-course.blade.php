<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Warning!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="smallBody">
            <div>
                <b>
                    <p>Are you Sure?</p>
                </b>

                <form action="{{ route('delete-course', $course->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn bg-maroon mr-3" type="submit">Yes Delete</button>
                    <button type="button" data-dismiss="modal" class="btn bg-gray">No</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>