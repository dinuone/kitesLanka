@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body">
                @livewire('stud-manage')
            </div>
        </div>
        
    </div>
@endsection

<script>
     window.addEventListener('OpenPaymentverify',function(){
        $('.verifypayment').find('span').html('');
        $('.verifypayment').find('form')[0].reset();
        $('.verifypayment').modal('show');
    });
    window.addEventListener('Closeverifymodal', function(){
        $('.verifypayment').find('span').html('');
        $('.verifypayment').find('form')[0].reset();
        $('.verifypayment').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'Payment Verified!',
          
        });
    });
    
   
</script>