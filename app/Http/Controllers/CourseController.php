<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $teachers = Teacher::Select('id','fullname','image_path')->get();
        $courses = Course::select('id','Name','image_path','teacher_id')->get();
        return view('course',[
            'courses'=>$courses,
            'teachers'=>$teachers
        ]);
    }

    public function selectcourse($id)
    {
        $selectCourse = Course::where('id',$id)->get();
        return view('course-details',[
            'selectCourse'=>$selectCourse
        ]);
    }

    public function selectteacher($id)
    {
        $thcourse = Course::where('teacher_id',$id)->get();
        return view('teacher-course',[
            'thcourse'=>$thcourse
        ]);
    }
}
