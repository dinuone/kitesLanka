<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use Carbon\Carbon;
use DB;

class TeacherPaymentSummary extends Controller
{
   

    public function index($id)
    {
    
        $courses = Course::select('Name','id')->where('id',$id)->get();
        $payments = Payment::where('course_id',$id)->paginate(10);
        $amount = Payment::where('course_id',$id)->where('payment_status',1)->whereMonth('created_at',Carbon::now()->month)->sum('amount');
        $studcount = Payment::where('course_id',$id)->count();
        return view('dashboard.teacher.payment-summary',[
            'courses'=>$courses,
            'payments'=>$payments,
            'amount'=>$amount,
            'studcount'=>$studcount
        ]);
    }

    public function search(Request $request){
        
        if($request->ajax())
        {   
            $output="";
            $payments=Payment::where('student_id','LIKE','%'.$request->search."%")->where('course_id',$request->crsid)->get();
            
            if($payments)
            {
                foreach ($payments as $key => $payment) {
                   
                    if($payment->payment_status == 1)
                    {
                        $payment_st = '<span class="badge bg-teal p-2">Pyament Verified</span>';
                    }
                    else{
                        $payment_st = '<span class="badge bg-maroon p-2">Not Verified</span>';
                    }
                $output.='<tr>'.
                '<td>'.$payment->student_id.'</td>'.
                '<td>'.$payment->student->FullName.'</td>'.
                '<td>'.$payment->student->contact.'</td>'.
                '<td>'.$payment->student->contact_whatsapp.'</td>'.
                '<td>'.$payment->student->school.'</td>'.
                '<td>'.$payment->amount.'</td>'.
                '<td>'.$payment_st.'</td>'.
                '</tr>';
                }
            
                return Response($output);
             }
           
    }
  
  }
}
