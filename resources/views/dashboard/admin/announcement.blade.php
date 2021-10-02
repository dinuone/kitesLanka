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

</script>