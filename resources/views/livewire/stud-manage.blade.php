<div>
<style>
    #crd1:hover {
        transform: scale(1.1);
        background-color: #0C1E7F;
        color: white;
        transition: transform .5s ease;
    }

    #crd2:hover {
        transform: scale(1.1);
        background-color: #D22779;
        color: white;
        transition: transform .5s ease;
    }

    #crd3:hover {
        transform: scale(1.1);
        background-color: #3E8E7E;
        color: white;
        transition: transform .5s ease;
    }

</style>
    <div class="row mb-3 ml-3 mt-2">
        <div class="col-md-3">
            <label for="">Course</label>
            <select class="form-control" wire:model="bycourse">
                <option value="">Not Selected</option>
                @foreach ($crs as $cr)
                    <option value="{{ $cr->id }}">{{ $cr->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col">
            <label for="">Month</label>
            <select class="form-control" wire:model="bymonth">
                <option value="">Not Selected</option>
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
                <a href="{{ route('admin-duepayment') }}" class="btn bg-maroon mt-4">Due Payments</a>
            </div>
        </div>


        @if ($checkedPayment)
            <div class="col-md-2">
                <div class="form-group mt-2">
                    <a wire:click.prevent="export" class="btn bg-Indigo mt-4"><i
                            class="fas fa-cloud-download-alt mr-2"></i>Download Report</a>
                </div>
            </div>
        @endif

    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card ml-3 p-2" id="crd1">
                <h5> Total Amount : <span class="badge bg-indigo">Rs.{{ $amount }}</span></h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card ml-3 p-2" id="crd2">
                <h5> Verified Payments : <span class="badge bg-indigo">{{ $verify }}</span> </h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card ml-3 p-2" id="crd3">
                <h5> Not Verified Payments : <span class="badge bg-indigo"> {{ $notverify }}</span></h5>
            </div>
        </div>
    </div>

    <table id="dataTable" class="table table-hover">
        <thead class="bg-Navy">
            <tr>
                <th><input type="checkbox" wire:model="selectAll"></th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Whatsapp Number</th>
                <th>Course</th>
                <th>Payment Date</th>
                <th>Payment for</th>
                <th>Amount</th>
                <th>Ref No</th>
                <th>Payment Status</th>
                <th></th>
                <th style="width:120px;">View PDF</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($payments->count())
                @foreach ($payments as $payment)
                    <td><input type="checkbox" value="{{ $payment->id }}" wire:model="checkedPayment"></td>
                    <td>{{ $payment->student_id }}</td>
                    <td>{{ $payment->student->FullName }}</td>
                    <td>{{ $payment->student->contact_whatsapp }}</td>
                    <td>{{ $payment->course->Name }}</td>
                    <td>{{ $payment->created_at->toDatestring() }}</td>
                    <td>{{ $payment->month }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->ref_number }}</td>
                    @if ($payment->payment_status == 0)
                        <td>
                            <h5><span class="badge badge-danger"><i class="fas fa-exclamation-triangle mr-2"></i> Not
                                    verified</span></h5>
                        </td>
                    @else
                        <td>
                            <h5><span class="badge badge-success"><i class="fas fa-check mr-2"></i>Verified</span></h5>
                        </td>
                    @endif
                    <td><button class="btn bg-indigo"
                            wire:click="OpenPaymentverify({{ $payment->id }})">Check</button>
                    </td>
                   
                    <td>
                        @if ($payment->pdf_file != null)
                        <a href="{{ route('pdf-view', $payment->id) }}" class="btn bg-teal">View PDF</a>
                        @endif
                    </td>
                   
                    
                    <td>
                        <a class="mr-3" wire:click="OpenEditPaymentModal({{ $payment->id }})"><i
                                class="far fa-edit" style="color:#10d430;"></i></a>
                        <a wire:click="deletePayment({{ $payment->id }},{{ $payment->student->id }})"><i
                                class="fas fa-trash" style="color:#e70c0c;"></i></a>
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
