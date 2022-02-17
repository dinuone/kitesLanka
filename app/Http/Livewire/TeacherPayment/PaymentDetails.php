<?php

namespace App\Http\Livewire\TeacherPayment;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class PaymentDetails extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $bycourse;
    public $courseID;
    public $bymonth;
    public $ref_number;
    public $paymentST = 1;
    public $search;
    public $paymentID;

    public $checkedPayment=[];
    public $selectAll = false;

    public $payment_id;

    public function render()
    {
        $search = '%'. $this->search . '%';

        $crs = Course::all();
        $payments = Payment::where('course_id', $this->bycourse)->where('month',$this->bymonth)
                    ->where('student_id','like', $search)->get();
        $paymentimage = Payment::where('id',$this->courseID)->get();

        $amount = Payment::where('course_id',$this->bycourse)->where('payment_status',1)->where('month',$this->bymonth)->sum('amount');
        
        $verify= Payment::where('course_id',$this->bycourse)->where('payment_status',1)->where('month',$this->bymonth)->count();

        $notverify= Payment::where('course_id',$this->bycourse)->where('payment_status',0)->where('month',$this->bymonth)->count();
        
        //return to payment edit modal
        $paymentStatus = Payment::where('id',$this->paymentID)->get();
        $payment_imgs = Payment::select('image_path','id')->where('id',$this->payment_id)->get();
        return view('livewire.teacher-payment.payment-details',[
            'payments'=>$payments,
            'crs'=>$crs,
            'paymentimage'=>$paymentimage,
            'paymentStatus'=> $paymentStatus,
            'amount'=>$amount,
            'verify'=>$verify,
            'notverify'=>$notverify,
            'payment_imgs'=>$payment_imgs
        ]);
    }

    public function OpenRecipt($id)
    {
        $this->payment_id = $id;
        $this->dispatchBrowserEvent('OpenViewRecipt',[
            'id'=>$id
        ]);
       
    }
}
