<div>
    <div class="row mb-3 ml-3 mt-2">
      <div class="col-md-3">
        <label for="">Course</label>
        <select class="form-control" wire:model="bycourse">
          <option value="0">Not Selected</option>
          @foreach ($crs as $cr)
          <option value="{{ $cr->id }}">{{ $cr->Name }}</option>
          @endforeach
        </select>
      </div>
      
      <div class="col">
        <label for="">Month</label>
        <select class="form-control" wire:model="bymonth">
          <option value="January">JAN</option>
          <option value="February">FEB</option>
          <option value="March">MAR</option>
          <option value="April">APR</option>
          <option value="May">MAY</option>
          <option value="June">JUN</option>
          <option value="July">JUL</option>
          <option value="August">AUG</option>
          <option value="Septmeber">SEP</option>
          <option value="October">OCT</option>
          <option value="November">NOV</option>
          <option value="December">DEC</option>
        </select>
      </div>

      <div class="col">
        <label for="">Search</label>
          <input type="text" class="form-control" wire:model.debounce.350ms="search">
      </div>

      <div class="col">
        <div class="form-group mt-2">
          <a href="{{ route('admin.duepayment') }}" class="btn bg-maroon mt-4">Due Payments</a>
        </div>
      </div>
       

      @if ($checkedPayment)
      <div class="col-md-2">
        <div class="form-group mt-2">
          <a wire:click.prevent="export" class="btn bg-Indigo mt-4"><i class="fas fa-cloud-download-alt mr-2"></i>Download Report</a>
        </div>
        </div>
      @endif
    </div>

    <table id="dataTable" class="table table-hover">
        <thead class="bg-Navy">
        <tr>
          <th><input type="checkbox" wire:model="selectAll"></th>
          <th>Student ID</th>
          <th>Full Name</th>
          <th>Course</th>
          <th></th>
          <th>Payment Date</th>
          <th>Payment for</th>
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
                <td><h5><span class="badge badge-warning"><i class="fas fa-info-circle mr-2"></i>Payment Done</span></h5></td>
              @endif
              <td>{{ $payment->created_at->toDatestring(); }}</td>
              <td>{{ $payment->month }}</td>
              <td>{{ $payment->amount }}</td>
              <td>{{ $payment->ref_number }}</td>
              @if ($payment->payment_status == 0)
                    <td><h5><span class="badge badge-danger"><i class="fas fa-exclamation-triangle mr-2"></i> Not verified</span></h5></td>
                    @else
                    <td><h5><span class="badge badge-success"><i class="fas fa-check mr-2"></i>Verified</span></h5></td>
               @endif
               <td><button class="btn bg-indigo" wire:click="OpenPaymentverify({{ $payment->id }})">Check</button></td>
               <td>
                <a class="mr-3" wire:click="OpenEditPaymentModal({{ $payment->id }})"><i class="far fa-edit" style="color:#10d430;"></i></a>
                <a wire:click="deletePayment({{ $payment->id }})"><i class="fas fa-trash" style="color:#e70c0c;"></i></a>
               </td>
            </tr>
            @endforeach
          @else
            <td colspan="11" class="text-danger text-center">No Any students Payments found!</td>
            @endif
        </tbody>
      </table>
      
      @include('modals.verifyPayment')
      @include('modals.edit-payment')

</div>

