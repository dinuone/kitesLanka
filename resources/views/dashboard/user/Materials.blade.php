@extends('layouts.stud')

@section('content')
<style>
    .card-img-top{max-width: 250px; max-height: 250px; }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
 
        }
</style>
    
@livewire('stud-materials')

@endsection

<script>
    window.addEventListener('OpenViewCourse',function(){
      $('.viewmaterial').modal('show');
  });
</script>