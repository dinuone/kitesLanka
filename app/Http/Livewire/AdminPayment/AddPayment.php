<?php

namespace App\Http\Livewire\AdminPayment;
use App\Models\Course;
use App\Models\Student;
use App\Models\Payment;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class AddPayment extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search,$bycourse;

    public function render()
    {
       $courses = Course::select('id','Name')->get();
       $filterdata = Student::whereHas('courses',function($query){
                $query->whereIn('course_id',[$this->bycourse]);
         })->get();
     
        return view('livewire.admin-payment.add-payment',[
            'students'=> Student::when($this->search, function($query,$search){
                return $query->where('FullName','like',"%$search%")
                ->orwhere('student_id','like',"%$search%");
            })->paginate(100),

            'courses'=>$courses,
            'filterdata'=>$filterdata
        ]);
    }

    public $amount,$student_id,$fullname,$month,$stid,$course,$photo;
    public function OpenAddPaymentModal($id)
    {
        $this->stid = $id;
        $info = Student::find($id);
        $this->fullname = $info->FullName;
        $this->student_id = $info->student_id;
        $this->dispatchBrowserEvent('OpenAddPaymentModal',[
            'id'=>$id
        ]);
    }

    public function save()
    {
            $this->validate([
                'student_id'=>'required',
                'course'=>'required',
                'photo'=>'required',
                'amount'=>'required',
                'month'=>'required'
                
            ]);
            //image name
            
            $payment = new Payment();
            $sid = $this->stid;
        
            $payment->image_path = $this->photo->store('images', 'public');
            $payment->student_id = $this->student_id;
            $payment->course_id = $this->course;
            $payment->st_id = $sid;
            $payment->amount = $this->amount;
            $payment->month = $this->month;
            $save = $payment->save();
    
            $update = Student::find($sid)->update([
                'payment_status'=>1
            ]);
    
            if($save){
                $this->dispatchBrowserEvent('ClosepaymenttModal');
            }
    }

}
