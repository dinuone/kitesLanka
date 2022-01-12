<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Teacher;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $studdata = Student::select(DB::raw("COUNT(*) as count"))
                    ->whereYear("created_at",date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        
        $duecount = Student::where('payment_status','=',0)->count();
        $studToday = Student::whereDate('created_at', Carbon::today())->get()->count();
        $studcount = Student::count();
        $teachercount = Teacher::count();
        $courseCount = Course::all()->count();
        
        $income = Payment::where('payment_status','=','1')->whereMonth('created_at',Carbon::now()->month)->sum('amount');
    
        return view('dashboard.admin.home',[
            'studToday'=>$studToday,
            'duecount'=>$duecount,
            'studdata'=>$studdata,
            'courseCount'=>$courseCount,
            'studcount'=>$studcount,
            'teachercount'=>$teachercount,
            'income'=>$income
        ]);
    }

    public function showtoday()
    {
        return view('dashboard.admin.StudTodayReg');
    }

    public function showavbCourse()
    {
        $courses = Course::Select('id','Name')->get();
        return view('dashboard.admin.avb-course',[
            'courses'=>$courses
        ]);
    }

    public function coursestud($id)
    {
        $course = Course::find($id);
        $selectcourse = Course::where('id',$id)->get();
        $students = $course->students()->paginate(5);
        return view('dashboard.admin.course-stud',[
            'students'=>$students,
            'selectcourse'=>$selectcourse
        ]);
    }
}
