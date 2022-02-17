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
        @livewire('stud-payment')
    </div>

@endsection

<script>
    window.addEventListener('OpenPaymentModal', function() {
        $('.addpayment').find('span').html('');
        $('.addpayment').find('form')[0].reset();
        $('.addpayment').modal('show');
    });


    window.addEventListener('ClosepaymenttModal', function() {
        $('.addpayment').find('span').html('');
        $('.addpayment').find('form')[0].reset();
        $('.addpayment').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'Payment Successfull!',

        });
    });


    window.addEventListener('OpenViewRecipt', function() {
        $('.viewrecipt').modal('show');
    });
</script>
