<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('dashboard.teacher.changepsw');
    }

    public function changePsw(Request $request)
    {
        $user = Auth::user();
        $user->password;
        
        $request->validate([
            'current_password'=>'required',
            'password'=>'required',
            'confirm_password'=>'required',
        ]);

        if(!Hash::check($request->current_password,$user->password)){
            return back()->with('change','Current Password not match!');
        
        }

        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Password successfully changed!');
    }
}
