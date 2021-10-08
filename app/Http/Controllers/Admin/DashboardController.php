<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $studToday = Student::whereDate('created_at', Carbon::today())->get()->count();
        return view('dashboard.admin.home',[
            'studToday'=>$studToday
        ]);
    }

    public function showtoday()
    {
        return view('dashboard.admin.StudTodayReg');
    }
}
