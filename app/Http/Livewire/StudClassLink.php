<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StudClassLink extends Component
{
    public $courseID;

    public function render()
    {
        $today = Carbon::today();

        $stdid = Auth::user()->id;
        $payments = Payment::where('payment_status', '=', 1)->where('st_id','=',$stdid)->where('course_id','=',$this->courseID)->get();
        $courses = Auth::guard('student')->user()->courses()->get();
    
        return view('livewire.stud-class-link',[
            'courses'=>$courses,
            'payments'=>$payments
           
        ]);
    }


    public function OpenClassLinkModal($id)
    {   
        $this->courseID = $id;
        $this->dispatchBrowserEvent('OpenClassLinkModal',[
            'id'=>$id
        ]);
    }

    public function markattend()
    {
        $now = Carbon::today();
        $sid = Auth::user()->id;
        
        
        $attend = Attendance::where('st_id','=',$sid)->where('course_id','=',$this->courseID)->where('created_at','=',$now)->first();
        if($attend == null)
        {
            $attendance = new Attendance();
            $attendance->attend = 1;
            $attendance->course_id = $this->courseID;
            $attendance->st_id = $sid;
    
            $save = $attendance->save();
            
            if($save){
                $this->dispatchBrowserEvent('CloseStudentModal');
            }
        }
        
    
       
    }
}
