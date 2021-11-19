<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\Course;

use App\Exports\StudAttendance;
use Maatwebsite\Excel\Facades\Excel;

class AttendaceReport extends Component
{  
    public $bycourse;
    public $startDate;
    public $EndDate;
    public $selectAll= false;
    public $selected=[];

    public function render()
    {

        $attend = Attendance::where('course_id', $this->bycourse)->whereBetween('created_at', [$this->startDate, $this->EndDate])
        ->get();
        $courses = Course::select('Name','id')->get();
        return view('livewire.attendace-report',[
            'courses'=>$courses,
            'attend'=>$attend
        ]);
    }

    //slect all
    public function updatedSelectAll($value)
    {
        if($value){
            $this->selected = Attendance::pluck('id');
        }
        else{
            $this->selected = [];
        }
    }


    //export report
    public function export()
    {
        return (new StudAttendance($this->selected))->download('Student-Attendance.xls'); 
      
    }



}
