<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

Use App\Models\Student;
Use App\Models\Course;


class StudentExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

    protected $selected;

    public function __construct($selected)
    {
        $this->selected = $selected;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return[
            'Student ID',
            'Student Full Name',
            'email',
            'Contact',
            'Contact Whatsaap',
            'School',
            'Address',
            'Enroll Courses',
            'Registered Date',
        ];
    }

    public function map($student): array
    {
         return[
             $student->student_id,
             $student->FullName,
             $student->email,
             $student->contact,
             $student->contact_whatsapp,
             $student->school,
             $student->address,
             $student->courses->pluck('Name')->implode(','),
             $student->created_at->toDatestring(),
         ];
    }

    public function query()
    { 
        return Student::with('courses:id,Name')->whereIn('id',$this->selected);
    }
}
