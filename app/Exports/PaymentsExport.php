<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\Payment;
Use App\Models\Student;
Use App\Models\Course;

class PaymentsExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    protected $checkedPayment;

    public function __construct($checkedPayment)
    {
        $this->checkedPayment = $checkedPayment;
    }
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return[
            '#payment ID',
            'Student Name',
            'Student ID',
            'Contact Whatsaap',
            'Course',
            'Amount',
            'Payment Status',
            'Ref Number',
            'Date'
        ];
    }

    public function map($payment): array
    {
         return[
             $payment->id,
             $payment->student->FullName,
             $payment->student_id,
             $payment->student->contact_whatsapp,
             $payment->course->Name,
             $payment->amount,
             $payment->payment_status,
             $payment->ref_number,
             $payment->created_at->toDatestring(),
         ];
    }

    public function query()
    {
        return Payment::with('Student:id,FullName','Course:id,Name')->whereIn('id',$this->checkedPayment);
    }
}
