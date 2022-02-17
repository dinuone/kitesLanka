@extends('layouts.admin')

@section('content')

    <div class="content">
        @livewire('course-link')
    </div>

@endsection

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


    window.addEventListener('OpenAddRecLinkModal', function() {
        $('.addReclink').find('span').html('');
        $('.addReclink').modal('show');
    });


    window.addEventListener('CloseRecModal', function() {
        $('.addReclink').find('span').html('');
        $('.addReclink').find('form')[0].reset();
        $('.addReclink').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'Recording Link Successfully Added!',

        });
    });

    window.addEventListener('swalconfirmRec', function(event) {
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
                window.livewire.emit('deleterec', event.detail.id);
            }
        });

    });

    window.addEventListener('deleted_rec', function(event) {
        Swal.fire({
            icon: 'success',
            title: 'Deleted',
            text: 'Selected Record Link has been deleted!',

        });
    });
</script>
