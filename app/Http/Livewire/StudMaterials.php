<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\material;
use App\Models\Student;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class StudMaterials extends Component
{
    public $courseID;

    public function render()
    {
        
        $stdid = Auth::user()->id;
        $student = Student::where('id',$stdid)->get();
        $paymentdone = Payment::where('st_id',$stdid)->where('course_id',$this->courseID)->where('payment_status',1)->get();

        $files = material::where('course_id',$this->courseID)->get();
        $courses = Auth::guard('student')->user()->courses()->get();
        return view('livewire.stud-materials',[
            'courses'=>$courses,
            'files'=>$files,
            'paymentdone'=>$paymentdone
        ]);
    }

    public function OpenViewCourse($id)
    {
        $this->courseID = $id;
        $this->dispatchBrowserEvent('OpenViewCourse',[
            'id'=>$id,
        ]);
    }
}
