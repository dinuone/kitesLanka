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

    window.addEventListener('OpenEditPaymentModal',function(){
        $('.editpayment').find('span').html('');
        $('.editpayment').modal('show');
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

    
    window.addEventListener('CloseEditPayment', function(){
        $('.editpayment').find('span').html('');
        $('.editpayment').find('form')[0].reset();
        $('.editpayment').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'Payment Details Updated!',
          
        });
    });

    window.addEventListener('swalconfirm',function(event){
        swal.fire({
            title:event.detail.title,
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('delete',event.detail.id);
            }
        });
            
    });

    window.addEventListener('deleted', function(event){
        Swal.fire({
            icon: 'success',
            title: 'Deleted',
            text: 'Selected Payment record has been deleted!',
          
        });
    });
   
</script>