<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $courses = Course::select('id','Name','description','image_path')->get();
        return view('welcome',[
            'courses'=>$courses
        ]);
    }
}
