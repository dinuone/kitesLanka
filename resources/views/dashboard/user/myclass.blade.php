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
    <div class="container">

        @livewire('stud-class-link')

    </div>

@endsection

<script>
    window.addEventListener('OpenClassLinkModal', function() {
        $('.classLink').modal('show');
    });


    window.addEventListener('RecLinkModal', function() {
        $('.recordlink').modal('show');
    });
</script>
