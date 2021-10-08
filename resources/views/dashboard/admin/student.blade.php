@extends('layouts.admin')

@section('content')
    
<div class="content">      
   @livewire('students')
</div>
@endsection 


<script>
    window.addEventListener('OpenAddStudentModal',function(){
        $('.addstudent').find('span').html('');
        $('.addstudent').find('form')[0].reset();
        $('.addstudent').modal('show');
    });

    window.addEventListener('CloseStudentModal', function(){
        $('.addstudent').find('span').html('');
        $('.addstudent').find('form')[0].reset();
        $('.addstudent').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'New Student has been Added!',
          
        });
    });

</script>






