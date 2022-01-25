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
    public $month,$rec_month;

    public function render()
    {
        $today = Carbon::today();

        $stdid = Auth::user()->id;
        
        $payments = Payment::where('payment_status', '=', 1)->where('month','=',$this->month)->where('st_id','=',$stdid)->where('course_id','=',$this->courseID)->get();
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
        $today = Carbon::today();
        $sid = Auth::user()->id;
        
        
        if(Attendance::where('st_id','=',$sid)->where('course_id','=',$this->courseID)->where('created_at','=',$today)->exists()) 
        {
            return null;

        }else{
            
            $attendance = new Attendance();
            $attendance->attend = 1;
            $attendance->course_id = $this->courseID;
            $attendance->st_id = $sid;
            $attendance->created_at = $today;
            $save = $attendance->save();
            
            if($save){
                $this->dispatchBrowserEvent('CloseStudentModal');
            }
        }
        
    
       
    }

    public function OpenRecLinkModal($id)
    {
        $this->courseID = $id;
        $this->dispatchBrowserEvent('RecLinkModal',[
            'id'=>$id
        ]);
    }
}
