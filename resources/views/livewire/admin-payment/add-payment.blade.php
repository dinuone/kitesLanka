<div>

    <div class="card">
        <div class="card-header bg-gray"><i class="far fa-money-bill-alt mr-2"></i>Add Student Payments</div>
        <div class="card-body">
            <div class="row mb-3  mt-2">
                <div class="col-md-3">
                    <input type="text" class="form-control" wire:model.debounce.350ms="search" placeholder="search..">
                </div>

                <div class="col-md-2">
                    <select class="form-control" wire:model="bycourse">
                        <option value="0">--Select Course--</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->Name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="table tbale-hover">
                <thead class="bg-navy">
                    <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>E-email</th>
                        <th>Contact</th>
                        <th>Contact(Whatsapp)</th>
                        <th>School</th>
                        <th>Enroll Course</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($filterdata))
                        @foreach ($filterdata as $data)
                            <tr>
                                <td>{{ $data->FullName }}</td>
                                <td>{{ $data->student_id }}</td>
                                <td>{{ $data->FullName }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->contact }}</td>
                                <td>{{ $data->contact_whatsapp }}</td>
                                <td>{{ $data->school }}</td>
                                <td>
                                    @foreach ($data->courses as $course)
                                        <span class="badge bg-indigo mt-2 p-2">{{ $course->Name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <button class="btn bg-teal"
                                        wire:click="OpenAddPaymentModal({{ $data->id }})">Add
                                        pyament</button>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->FullName }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->contact }}</td>
                                <td>{{ $student->contact_whatsapp }}</td>
                                <td>{{ $student->school }}</td>
                                <td>
                                    @foreach ($student->courses as $course)
                                        <span class="badge bg-indigo mt-2 p-2">{{ $course->Name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <button class="btn bg-teal"
                                        wire:click="OpenAddPaymentModal({{ $student->id }})">Add
                                        pyament</button>
                                </td>

                            </tr>
                        @endforeach
                    @endif


                </tbody>
            </table>
            {{ $students->links() }}
        </div>

    </div>
    @include('modals-payment.add-payment')
</div>
