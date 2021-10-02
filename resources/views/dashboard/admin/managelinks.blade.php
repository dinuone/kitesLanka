@extends('layouts.admin')

@section('content')

    <div class="content">
        @livewire('course-link')
    </div>

@endsection

<script>
    window.addEventListener('OpenAddLinkModal',function(){
        $('.addlink').find('span').html('');
        $('.addlink').find('form')[0].reset();
        $('.addlink').modal('show');
    });
  
    window.addEventListener('CloseEditCourseModal', function(){
        $('.addlink').find('span').html('');
        $('.addlink').find('form')[0].reset();
        $('.addlink').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'Video Link Successfully Added!',
          
        });
    });
  
  
    
</script>