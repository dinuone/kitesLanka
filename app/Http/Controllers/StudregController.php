<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class StudregController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('dashboard.user.register',[
            'courses'=>$courses
        ]);
    }
}
