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

    window.addEventListener('OpenEditModal',function(){
        $('.editstudent').find('span').html('');
        $('.editstudent').modal('show');
    });

    window.addEventListener('CloseEditStudent',function(){
        $('.editstudent').find('span').html('');
        $('.editstudent').find('form')[0].reset();
        $('.editstudent').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Updated',
            text: 'Student Details are Updated!',
          
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
            text: 'Selected Student Record has been deleted!',
          
        });
    });


    window.addEventListener('swal:deleteStudents', function(event){
        swal.fire({
            title:event.detail.title,
            text: "You won't be able to revert this!",
            html:event.detail.html,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deletecheckedtudents',event.detail.checkedIDS);
            }
        });
    });


    //reset status 
    window.addEventListener('swal:resetstudent', function(event){
        swal.fire({
            title:event.detail.title,
            text: "You won't be able to revert this!",
            html:event.detail.html,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reset it!'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('resetstud',event.detail.checkedIDS);
            }
        });
    })

</script>






