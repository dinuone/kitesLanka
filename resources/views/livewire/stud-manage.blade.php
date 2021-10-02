<div>
    <div class="row mb-3 ml-3 mt-2">
      <div class="col-md-3">
        <label for="">Course</label>
        <select class="form-control" wire:model="bycourse">
          @foreach ($crs as $cr)
          <option value="{{ $cr->id }}">{{ $cr->Name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col">
        <a href="" class="btn btn-warning mt-4">Due Payments</a>
      </div>
      <div class="col-md-2">
        <a href="" class="btn btn-info mt-4"><i class="fas fa-cloud-download-alt mr-2"></i>Download Report</a>
      </div>
    </div>

    <table id="dataTable" class="table table-bordered table-hover">
        <thead class="bg-secondary">
        <tr>
          <th>Student ID</th>
          <th>Full Name</th>
          <th>Payment Status</th>
          <th>Payment Date</th>
          <th>Amount</th>
          <th>Student Access</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @if ($payments->count())
            @foreach ($payments as $payment)
            <tr>
              <td>{{ $payment->student_id }}</td>
              <td>{{ $payment->student->FullName }}</td>
              @if ($payment->student->payment_status == 1)
                <td><h5><span class="badge badge-success"><i class="fas fa-check mr-2"></i>Payment Received </span></h5></td>
              @else
                <td><h5><span class="badge badge-warning"><i class="fas fa-info-circle mr-2"></i>Payment Not Received</span></h5></td>
              @endif
              <td>{{ $payment->created_at->toDatestring(); }}</td>
              <td>{{ $payment->amount }}</td>
              @if ($payment->payment_status == 0)
                    <td><h5><span class="badge badge-danger"><i class="fas fa-exclamation-triangle mr-2"></i> Not verified</span></h5></td>
                    @else
                    <td><h5><span class="badge badge-success"><i class="fas fa-check mr-2"></i>Verified</span></h5></td>
               @endif
               <td><button class="btn btn-primary" wire:click="OpenPaymentverify({{ $payment->id }})"><i class="far fa-check-square mr-2"></i>Check</button></td>
            </tr>
            @endforeach
          @else
            <td colspan="6" class="text-danger text-center">No Any students Payments found!</td>
            @endif
        </tbody>
      </table>
      
    
      @include('modals.verifyPayment')

</div>

