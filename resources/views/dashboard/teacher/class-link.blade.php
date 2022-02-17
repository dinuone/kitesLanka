@extends('layouts.teacher')

@section('content')
    <div class="content">
        @livewire('teacher-link')
    </div>

    <script>
        window.addEventListener('OpenAddLinkModal', function() {
            $('.addlink').find('span').html('');
            $('.addlink').find('form')[0].reset();
            $('.addlink').modal('show');
        });

        window.addEventListener('CloseEditCourseModal', function() {
            $('.addlink').find('span').html('');
            $('.addlink').find('form')[0].reset();
            $('.addlink').modal('hide');
            Swal.fire({
                icon: 'success',
                title: 'Successfull',
                text: 'Video Link Successfully Added!',

            });
        });

        window.addEventListener('swalconfirm', function(event) {
            swal.fire({
                title: event.detail.title,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('delete', event.detail.id);
                }
            });

        });

        window.addEventListener('deleted', function(event) {
            Swal.fire({
                icon: 'success',
                title: 'Deleted',
                text: 'Selected Course Link has been deleted!',

            });
        });
    </script>

@endsection
