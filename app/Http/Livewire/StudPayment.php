<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Student;
use App\Models\Payment;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class StudPayment extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $photo,$student_id;
    public $course;
    public $amount;
    public $month;
    public $payST = 1;
    public $paymentid;
    // public $pdffile;
   

    public function render()
    {
    
        $sid = Auth::user()->id;
        $payments = Payment::where('st_id',$sid)->paginate(5);

        $courses = Auth::guard('student')->user()->courses()->get();
        $students = Student::where('id',$sid)->get();
        $payment_imgs = Payment::select('image_path','id')->where('id',$this->paymentid)->get();
        
        return view('livewire.stud-payment',[
            'courses'=>$courses,
            'students'=>$students,
            'payments'=>$payments,
            'payment_imgs'=>$payment_imgs

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
            'amount'=>'numeric',
            'month'=>'required',
            'photo'=>'required|mimes:jpeg,jpg,png',
            
        ]);
        //image name
        
        $payment = new Payment();
        $sid = Auth::user()->id;
        $payment->student_id = $this->student_id;
        $payment->course_id = $this->course;
        $payment->st_id = $sid;
        $payment->amount = $this->amount;
        $payment->month = $this->month;
        $payment->image_path = $this->photo->store('images', 'public');
        
        
        // if($this->pdffile){
        //     $filename = $this->pdffile->store('reciptPDF','public');
        //     $payment->pdf_file = $filename;
        // }
       
        $save = $payment->save();

        $update = Student::find($sid)->update([
            'payment_status'=>$this->payST
        ]);

        if($save){
            $this->dispatchBrowserEvent('ClosepaymenttModal');
        }
    }

    
    public function OpenRecipt($id)
    {
        $this->paymentid = $id;
        $this->dispatchBrowserEvent('OpenViewRecipt',[
            'id'=>$id
        ]);
       
    }

    // public $showimage = false;
    // public $showpdf = false;
    // public function showimg()
    // {
    //     $this->showimage =! $this->showimage;
    // }

    // public function showpdf()
    // {
    //     $this->showpdf =! $this->showpdf;
    // }
}
