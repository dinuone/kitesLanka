<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class StudAttendController extends Controller
{
    
    public function index($id)
    {   
        $attend = Attendance::where('st_id',$id)->get();
        return view('dashboard.teacher.view-attend',[
            'attend'=>$attend
        ]);
    }
}
