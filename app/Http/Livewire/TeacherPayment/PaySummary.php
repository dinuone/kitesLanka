<?php

namespace App\Http\Livewire\TeacherPayment;
use App\Models\Student;
use App\Models\Course;
use Livewire\Component;

class PaySummary extends Component
{
    public $filtercourse,$search,$paymentSt;
    public function render()
    {
        $filterdata = Student::whereHas('courses',function($query){
            $query->whereIn('course_id',[$this->filtercourse])->where('payment_status','=',$this->paymentSt)->where('FullName','like',"%$this->search%");
          })->get();

        $count = Student::whereHas('courses',function($query){
            $query->whereIn('course_id',[$this->filtercourse])->where('payment_status','=',$this->paymentSt)->where('FullName','like',"%$this->search%");
        })->count();


        $courses = Course::all();

        return view('livewire.teacher-payment.pay-summary',[
            'filterdata'=>$filterdata,
            'courses'=>$courses,
            'count'=>$count
        ]);
    }
}
