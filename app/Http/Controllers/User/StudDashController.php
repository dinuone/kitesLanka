<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Student;
use App\Models\Course;
use DB;

use Illuminate\Support\Facades\Auth;

class StudDashController extends Controller
{

    public function index()
    {   
        $stdid = Auth::user()->id;
        $student = Student::where('id',$stdid)->get();
        $avbCourse = Course::all();
        $course = Auth::guard('student')->user()->courses()->get();
        $announce = Announcement::all();
        return view('dashboard.user.home',[
            'announce'=>$announce,
            'course'=>$course,
            'avbCourse'=>$avbCourse,
            'student'=>$student
        ]);

        
    }

    public function showreg($id)
    {
        $stdid = Auth::user()->id;
        $student = Student::where('id',$stdid)->get();
        $course = Course::where('id',$id)->get();
      
        return view('dashboard.user.course-reg',[
            'id'=>$id,
            'student'=>$student,
            'course'=>$course
        ]);

        
        
    }

    public function save(Request $request)
    {
        $courseid =$request->course;
        
        $user = Auth::guard('student')->id();
        $studid = Student::find($user);
        $studid->courses()->syncWithoutDetaching($courseid);
        
        return redirect()->route('student.myclass')->with('success');
        
    }

}
