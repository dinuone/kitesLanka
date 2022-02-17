@extends('layouts.admin')

@section('content')

    <div class="content">
        @livewire('admin-payment.add-payment')
    </div>

@endsection

<script>
    window.addEventListener('OpenAddPaymentModal', function() {
        $('.addpayment').find('span').html('');
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
</script>
