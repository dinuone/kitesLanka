<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        return view('dashboard.teacher.home');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $creds = $request->only('email','password');

        if(Auth::guard('teacher')->attempt($creds)){
            return redirect()->route('teacher.home');
        }else{
            return redirect()->back()->with('fail','Incorrect Username or Password');
        }

    }
}
