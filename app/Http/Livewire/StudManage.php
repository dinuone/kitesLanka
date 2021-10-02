<?php

namespace App\Http\Livewire;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;

use Livewire\Component;
use Livewire\WithPagination;


class StudManage extends Component
{

    use WithPagination;

    public $bycourse= 1;
    public $courseID;
    public $refnum;
    public $paymentST = 1;

    public function render()
    {  
        $crs = Course::latest()->paginate(5);
        $payments = Payment::where('course_id', $this->bycourse)->get();
        $students = Student::all();
        $paymentimage = Payment::where('id',$this->courseID)->get();
       
        return view('livewire.stud-manage',[
            'payments'=>$payments,
            'crs'=>$crs,
           'students'=>$students,
           'paymentimage'=>$paymentimage
            
           
        ]);
    }


    public function OpenPaymentverify($id)
    {
        $info = Payment::find($id);
        $this->courseID = $info->id;
        
        $this->dispatchBrowserEvent('OpenPaymentverify',[
            'id'=>$id,
        ]);
    }

    public function access()
    {
        $this->validate([
            'refnum'=>'required'
            
        ]);

    
        $update = Payment::find($this->courseID)->update([
            'ref_number'=>$this->refnum,
            'payment_status'=>$this->paymentST
        ]);

        if($update){
            $this->dispatchBrowserEvent('Closeverifymodal');
        }
    }


        
}
