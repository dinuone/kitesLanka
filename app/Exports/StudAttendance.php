<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\Attendance;

class StudAttendance implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    protected $selected;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($selected)
    {
        $this->selected = $selected;
    }

    public function headings(): array
    {
        return[
            'Student ID',
            'Full Name',
            'Contact Whatsaap',
            'Course Name',
            'Attend Date',
        ];
    }

    public function map($attend): array
    {
         return[
             $attend->student->student_id,
             $attend->student->FullName,
             $attend->student->contact_whatsapp,
             $attend->course->Name,
             $attend->created_at->toDatestring(),
            
         ];
    }

    public function query()
    {
        return Attendance::with('Student:id,FullName','Course:id,Name')->whereIn('id',$this->selected);
    }


}
