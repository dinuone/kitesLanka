<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;

use Illuminate\Support\Facades\Auth;

class StudCourseController extends Controller
{
    public function index()
    {   $stdid = Auth::user()->id;
        $payments = Payment::where('payment_status', '=', 1)->where('st_id','=',$stdid)->get();
        $courses = Auth::guard('student')->user()->courses()->get();
        return view('dashboard.user.myclass',[
            'courses'=>$courses,
            'payments'=>$payments
        ]);
    }
}
