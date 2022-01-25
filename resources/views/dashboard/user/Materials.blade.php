@extends('layouts.stud')

@section('content')
    <style>
        .card-img-top {
            max-width: 250px;
            max-height: 250px;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;

        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }

    </style>
    <img src="{{ asset('background.jpg') }}" alt="" id="myvideo">
    @livewire('stud-materials')

@endsection

<script>
    window.addEventListener('OpenViewCourse', function() {
        $('.viewmaterial').modal('show');
    });
</script>
