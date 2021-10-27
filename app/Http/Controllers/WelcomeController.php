<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $courses = Course::Select('id','Name','description','image_path','teacher_id')->get();
        $teachers = Teacher::Select('id','fullname','image_path')->get();
        return view('welcome',[
            'courses'=>$courses,
            'teachers'=>$teachers
        ]);
    }
}
