<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Student;
use App\Models\Payment;

use Livewire\WithFileUploads;

class StudPayment extends Component
{
    use WithFileUploads;

    public $photo,$student_id;
    public $course;
    public $amount;
   

    public function render()
    {
        $sid = Auth::user()->id;
        $payments = Payment::where('st_id',$sid)->get();

        $courses = Auth::guard('student')->user()->courses()->get();
        $students = Student::where('id',$sid)->get();
        
        return view('livewire.stud-payment',[
            'courses'=>$courses,
            'students'=>$students,
            'payments'=>$payments
            
        ]);
    }

    public function OpenPaymentModal($id)
    {
        $info = Course::find($id);

        $this->course = $info->id;
        $this->dispatchBrowserEvent('OpenPaymentModal',[
            'id'=>$id
        ]);
    }

    public function save()
    {
        $this->validate([
            'student_id'=>'required',
            'course'=>'required',
            'photo'=>'image|max:1024',
            'amount'=>'required'
            
        ]);
        //image name
        

        $payment = new Payment();
        $sid = Auth::user()->id;
        
        $payment->image_path = $this->photo->store('images', 'public');
        $payment->student_id = $this->student_id;
        $payment->course_id = $this->course;
        $payment->st_id = $sid;
        $payment->amount = $this->amount;
        $save = $payment->save();

        if($save){
            $this->dispatchBrowserEvent('ClosepaymenttModal');
        }
    }
}
