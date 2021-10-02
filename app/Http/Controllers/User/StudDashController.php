<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Student;

use Illuminate\Support\Facades\Auth;

class StudDashController extends Controller
{
    public function index()
    {
        
        $course = Auth::guard('student')->user()->courses()->get();
        $announce = Announcement::all();
        return view('dashboard.user.home',[
            'announce'=>$announce,
            'course'=>$course
        ]);
    }


}
