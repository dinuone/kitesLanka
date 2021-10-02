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
        @livewire('stud-payment')
    </div>

@endsection

<script>
    window.addEventListener('OpenPaymentModal',function(){
      $('.addpayment').find('span').html('');
      $('.addpayment').find('form')[0].reset();
      $('.addpayment').modal('show');
  });


  window.addEventListener('ClosepaymenttModal', function(){
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