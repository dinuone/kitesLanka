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

<div class="container">
    
    @livewire('stud-class-link')
      
</div>

@endsection

<script>
    window.addEventListener('OpenClassLinkModal',function(){
      $('.classLink').modal('show');
  });

</script>
