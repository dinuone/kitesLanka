<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use DB;

class ReportController extends Controller
{
    public function index()
    {
      
        $courses = Course::all();
        $junior = Attendance::select(DB::raw("COUNT(*) as count"))
        ->where('course_id',1)
        ->whereYear("created_at",date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $adult = Attendance::select(DB::raw("COUNT(*) as count"))
        ->where('course_id',2)
        ->whereYear("created_at",date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');


        return view('dashboard.admin.AdminReport',[ 
            'courses'=>$courses,
            'junior'=>$junior,
            'adult'=>$adult
        ]);

    }

}
