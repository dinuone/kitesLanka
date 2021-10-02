@extends('layouts.admin')

@section('content')

<div class="container-fluid">
   <div class="row">
       <div class="col-md-6">
        @livewire('courses')
       </div>

       <div class="col-md-6">
         
       </div>
   </div>

   <div class="container-fluid">
     <div class="card shadow">
         <div class="card-body">
            @livewire('stud-course-count')    
         </div>
     </div>
 
</div>

   
</div>
  


@endsection

<script>
    window.addEventListener('OpenAddCourseModal',function(){
        $('.addcourse').find('span').html('');
        $('.addcourse').find('form')[0].reset();
        $('.addcourse').modal('show');
    });
  
    window.addEventListener('CloseCourseModal', function(){
        $('.addcourse').find('span').html('');
        $('.addcourse').find('form')[0].reset();
        $('.addcourse').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'New Course has been Added!',
          
        });
    });

   

  
  
    
</script>