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
        <label for="">Search</label>
          <input type="text" class="form-control" wire:model.debounce.350ms="search">
      </div>
      <div class="col">
        <a href="{{ route('admin.duepayment') }}" class="btn btn-warning mt-4">Due Payments</a>
        @if ($checkedPayment)
        <button class="btn btn-danger mt-4 ml-2">Delete Selected</button>
        @endif
      </div>
      <div class="col-md-2">
        <a wire:click.prevent="export " class="btn btn-info mt-4"><i class="fas fa-cloud-download-alt mr-2"></i>Download Report</a>
      </div>

    </div>

    <table id="dataTable" class="table table-hover">
        <thead class="bg-info">
        <tr>
          <th><input type="checkbox" wire:model="selectAll"></th>
          <th>Student ID</th>
          <th>Full Name</th>
          <th>Course</th>
          <th></th>
          <th>Payment Date</th>
          <th>Amount</th>
          <th>Ref No</th>
          <th>Payment Status</th>
          <th></th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @if ($payments->count())
            @foreach ($payments as $payment)
              <td><input type="checkbox" value="{{ $payment->id }}" wire:model="checkedPayment"></td>
              <td>{{ $payment->student_id }}</td>
              <td>{{ $payment->student->FullName }}</td>
              <td>{{ $payment->course->Name }}</td>
              @if ($payment->student->payment_status == 1)
                <td><h5><span class="badge badge-success"><i class="fas fa-check mr-2"></i>Payment Recevied..</span></h5></td>
              @else
                <td><h5><span class="badge badge-warning"><i class="fas fa-info-circle mr-2"></i>Due Payment..</span></h5></td>
              @endif
              <td>{{ $payment->created_at->toDatestring(); }}</td>
              <td>{{ $payment->amount }}</td>
              <td>{{ $payment->ref_number }}</td>
              @if ($payment->payment_status == 0)
                    <td><h5><span class="badge badge-danger"><i class="fas fa-exclamation-triangle mr-2"></i> Not verified</span></h5></td>
                    @else
                    <td><h5><span class="badge badge-success"><i class="fas fa-check mr-2"></i>Verified</span></h5></td>
               @endif
               <td><button class="btn btn-primary" wire:click="OpenPaymentverify({{ $payment->id }})">Check</button></td>
               <td>
                <a class="mr-3" wire:click="OpenEditPaymentModal({{ $payment->id }})"><i class="far fa-edit" style="color:#10d430;"></i></a>
                <a wire:click="deletePayment({{ $payment->id }})"><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
               </td>
            </tr>
            @endforeach
          @else
            <td colspan="6" class="text-danger text-center">No Any students Payments found!</td>
            @endif
        </tbody>
      </table>
      
      @include('modals.verifyPayment')
      @include('modals.edit-payment')

</div>

