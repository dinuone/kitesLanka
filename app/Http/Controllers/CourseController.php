<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::All();
        return view('course',[
            'courses'=>$courses
        ]);
    }

    public function selectcourse($id)
    {
        $selectCourse = Course::where('id',$id)->get();
        return view('course-details',[
            'selectCourse'=>$selectCourse
        ]);
    }
}
