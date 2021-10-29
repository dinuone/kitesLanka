<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

use Illuminate\Support\Facades\Auth;

class MyClassController extends Controller
{
    public function index()
    {
        $user = Auth::guard('teacher')->id();
        $courses = Course::where('teacher_id',$user)->get();
        return view('dashboard.teacher.myclass',[
            'courses'=>$courses
        ]);
    }

    public function mystudents($id)
    {
        $course = Course::find($id);
        $students = $course->students;
        return view('dashboard.teacher.mystudents',[
            'students'=>$students
        ]);
    }
}
