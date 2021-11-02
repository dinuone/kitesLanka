@extends('layouts.admin')

@section('content')

<div class="content">
    @livewire('stud-announcement')
</div>


@endsection


<script>
     window.addEventListener('OpenAnnouncementModal',function(){
        $('.addannouncement').find('span').html('');
        $('.addannouncement').find('form')[0].reset();
        $('.addannouncement').modal('show');
    });
   
    window.addEventListener('CloseAnnouncementModal', function(){
        $('.addannouncement').find('span').html('');
        $('.addannouncement').find('form')[0].reset();
        $('.addannouncement').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'Announcement Sent!',
          
        });
    });

    window.addEventListener('OpenEditModal',function(){
        $('.editannouncement').find('span').html('');
        $('.editannouncement').find('form')[0].reset();
        $('.editannouncement').modal('show');
    });
    
    window.addEventListener('CloseEditModal',function(){
        $('.editannouncement').find('span').html('');
        $('.editannouncement').find('form')[0].reset();
        $('.editannouncement').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Updated',
            text: 'Announcement Details are Updated!',
          
        });
    });

    window.addEventListener('swalconfirm',function(event){
        swal.fire({
            title:event.detail.title,
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('delete',event.detail.id);
            }
        });
            
    });

    window.addEventListener('deleted', function(event){
        Swal.fire({
            icon: 'success',
            title: 'Deleted',
            text: 'Selected food item has been deleted!',
          
        });
    });

</script>