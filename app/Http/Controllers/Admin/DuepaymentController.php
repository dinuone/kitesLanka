<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class DuepaymentController extends Controller
{
    public function index()
    {
        $students = Student::where('payment_status','=',0)->paginate(6);
        $duecount = Student::where('payment_status','=',0)->count();
        return view('dashboard.admin.DuePayment',[
            'students'=>$students,
            'duecount'=>$duecount
        ]);
    }
}
