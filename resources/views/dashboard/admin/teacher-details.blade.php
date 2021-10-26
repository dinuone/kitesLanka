@extends('layouts.admin')

@section('content')
    @livewire('admin-teacher')
@endsection

<script>
    window.addEventListener('OpenAddTeacherModal',function(){
       $('.addteacher').find('span').html('');
       $('.addteacher').find('form')[0].reset();
       $('.addteacher').modal('show');
   });

   window.addEventListener('CloseTeacherModal', function(){
        $('.addteacher').find('span').html('');
        $('.addteacher').find('form')[0].reset();
        $('.addteacher').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'Teacher has been Added!',
          
        });
    });


</script>