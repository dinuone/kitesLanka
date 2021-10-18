<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        $attend = Attendance::all();
        return view('dashboard.admin.Attendance',[
            'attend'=>$attend
        ]);
    }

}
