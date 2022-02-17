<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $duecount = Student::where('payment_status','=',0)->count();
        $studToday = Student::whereDate('created_at', Carbon::today())->get()->count();
        $user = Auth::guard('teacher')->id();
        $courses = Course::where('teacher_id',$user)->get();
        // $income = Payment::where('payment_status','=','1')->where('course_id',)->whereMonth('created_at',Carbon::now()->month)->sum('amount');
        return view('dashboard.teacher.home',[
            'studToday'=>$studToday,
            'duecount'=>$duecount,
            'courses'=>$courses
        ]);
    }

    public function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $creds = $request->only('email','password');

        if(Auth::guard('teacher')->attempt($creds)){
            return redirect()->route('teacher.home');
        }else{
            return redirect()->back()->with('fail','Incorrect Username or Password');
        }

    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }


}
