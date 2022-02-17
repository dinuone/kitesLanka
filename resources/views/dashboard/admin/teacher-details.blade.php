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

    window.addEventListener('EditTeacherModal',function(){
        $('.editteacher').find('span').html('');
        $('.editteacher').modal('show');
    });

    window.addEventListener('CloseEdiTeacherModal',function(){
        $('.editteacher').find('span').html('');
        $('.editteacher').find('form')[0].reset();
        $('.editteacher').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Updated',
            text: 'Teacher Details are Updated!',
          
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
            text: 'Selected Teacher record has been deleted!',
          
        });
    });

</script>