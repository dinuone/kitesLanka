<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\material;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudMaterialController extends Controller
{
    public function index()
    {
        $files = material::all();
        $courses = Auth::guard('student')->user()->courses()->get();
        return view('dashboard.user.Materials',[
            'files'=>$files,
            'courses'=>$courses
        ]);
    }

    public function download($file_name)
    {
        $path = public_path('assets/'.$file_name);
        return response()->download($path);
        
    }
}
