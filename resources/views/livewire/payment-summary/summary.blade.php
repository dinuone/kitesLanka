<div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="search.." wire:model="search">
                </div>
                <div class="col">
                    <select class="form-control" wire:model="filtercourse">
                        <option value="">--Select course--</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" wire:model="paymentSt">
                        <option value="">--Payment Status--</option>
                        <option value="1">Payment Done</option>
                        <option value="0">Payment Due</option>
                    </select>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>E-email</th>
                        <th>Contact</th>
                        <th>Contact(Whatsapp)</th>
                        <th>School</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($filterdata))
                        @foreach ($filterdata as $data)
                            <tr>
                                <td>{{ $data->student_id }}</td>
                                <td>{{ $data->FullName }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->contact }}</td>
                                <td>{{ $data->contact_whatsapp }}</td>
                                <td>{{ $data->school }}</td>
                                <td>{{ $data->address }}</td>
                                <td>
                                    @if ($data->payment_status == 1)
                                        <span class="badge bg-teal p-2">Payment Done</span>
                                    @else
                                        <span class="badge bg-maroon p-2">Payment Due</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
