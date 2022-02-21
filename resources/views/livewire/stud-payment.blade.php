<div>
    <div>
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 col-sm-6">
                    <div class="card-body">
                        <div class="card mt-3 shadow">
                            <div class="card-header bg-indigo">{{ $course->Name }}</div>
                            <img class="card-img-top center" src="{{ asset('storage/' . $course->image_path) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <hr>

                                @foreach ($students as $student)
                                    <button class="btn bg-maroon"
                                        wire:click="OpenPaymentModal({{ $course->id }})">Click here to Pay</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3 bg-navy">
                <h6 class="m-0 font-weight-bold text-white">Payment Summary</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Student Full Name</th>
                                <th>Student ID</th>
                                <th>Course</th>
                                <th>Date</th>
                                <th>Payment Status</th>
                                <th>Payment for</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($payments))
                                @foreach ($payments as $payment)
                                    <tr>
                                        @foreach ($students as $student)
                                            <td>{{ $student->FullName }}</td>
                                        @endforeach
                                        <td>{{ $payment->student_id }}</td>
                                        <td>{{ $payment->course->Name }}</td>
                                        <td>{{ $payment->created_at->toDatestring() }}</td>
                                        <td>
                                            @if ($payment->payment_status == 0)
                                                <h5><span class="badge bg-maroon"><i
                                                            class="fas fa-exclamation-triangle mr-2"></i>Payment Not
                                                        verified..</span></h5>
                                            @else
                                                <h5><span class="badge bg-lime"><i class="fas fa-check mr-2"></i>
                                                        Payment Verified...</span></h5>
                                            @endif
                                        </td>
                                        <td>{{ $payment->month }}</td>
                                        {{-- <td><button class="btn bg-indigo"
                                                wire:click="OpenRecipt({{ $payment->id }})">View Recipt</button></td>
                                    </tr> --}}
                                @endforeach
                            @else
                                <td colspan="7" class="text-center text-danger">Cannot find any payment records!</td>
                            @endif
                        </tbody>
                    </table>
                    {{ $payments->links() }}
                </div>
            </div>
        </div>


    </div>

    @include('modals.payment-modal')
    {{-- @include('modals.view-recipt') --}}
</div>
