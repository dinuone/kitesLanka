@extends('layouts.teacher')

@section('content')
    <div class="content">
        @livewire('teacher-payment.payment-details')
    </div>

@endsection

<script>
    window.addEventListener('OpenViewRecipt', function() {
        $('.viewrecipt').modal('show');
    });
</script>
