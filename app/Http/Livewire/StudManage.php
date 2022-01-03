<?php

namespace App\Http\Livewire;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Exports\PaymentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudManage extends Component
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

    public $up_stid,$up_amount,$up_course,$up_status,$up_month;
    protected $listeners=['delete'];

    public function render()
    {   
        $search = '%'. $this->search . '%';

        $crs = Course::all();
        $payments = Payment::where('course_id', $this->bycourse)->where('month',$this->bymonth)
                    ->where('student_id','like', $search)->get();
        $paymentimage = Payment::where('id',$this->courseID)->get();
        
        //return to payment edit modal
        $paymentStatus = Payment::where('id',$this->paymentID)->get();
        return view('livewire.stud-manage',[
            'payments'=>$payments,
            'crs'=>$crs,
            'paymentimage'=>$paymentimage,
            'paymentStatus'=> $paymentStatus
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
    
    public function OpenEditPaymentModal($id)
    {
        $this->paymentID = $id;

        $info = Payment::find($id);
        $this->up_stid = $info->student_id;
        $this->up_amount = $info->amount;
        $this->up_course = $info->course_id;
        $this->up_status = $info->payment_status;
        $this->up_month = $info->month;
        $this->dispatchBrowserEvent('OpenEditPaymentModal',[
            'id'=>$id,
        ]);
    }

    public function update()
    {
        $paymentID = $this->paymentID;

        $update=Payment::find($paymentID)->update([
           'amount'=>$this->up_amount,
           'course_id'=>$this->up_course,
           'payment_status'=>$this->up_status,
           'month'=>$this->up_month
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditPayment');
        }
    }

    public function access()
    {
        $this->validate([
            'ref_number'=>'required|unique:payments'  
        ]);

        $update = Payment::find($this->courseID)->update([
            'ref_number'=>$this->ref_number,
            'payment_status'=>$this->paymentST
        ]);

        if($update){
            $this->dispatchBrowserEvent('Closeverifymodal');
        }
    }


    public function deletePayment($id)
    {
        $info = Payment::find($id);
        $this->dispatchBrowserEvent('swalconfirm',[
            'title'=>'Are You Sure?',
            'id'=>$id
        ]);
    }

    public function delete($id)
    {
        $del = Payment::find($id)->delete();
        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
    }

    public function export()
    {
        return (new PaymentsExport($this->checkedPayment))->download('payment-summary.xls'); 
      
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->checkedPayment = Payment::pluck('id');
        }
        else{
            $this->checkedPayment = [];
        }
    }


        
}
