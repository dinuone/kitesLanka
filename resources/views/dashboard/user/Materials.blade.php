@extends('layouts.stud')

@section('content')
<style>
    #bg--img{
     display: flex;
     max-width: 1000px;
     position: absolute;
     right: 0px;
     bottom: 0px;
 }


 </style>
 <img src="{{ asset('bg-new.jpg') }}" alt="bg-img" id="bg--img">
    @livewire('stud-materials')

@endsection

<script>
    window.addEventListener('OpenViewCourse', function() {
        $('.viewmaterial').modal('show');
    });
</script>
