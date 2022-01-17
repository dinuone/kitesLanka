<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function check(Request $request)
    {
        
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required'
        ]);

        $creds = $request->only('email','password');

        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin-home');
        }
        else{
            return redirect()->route('admin-login')->with('fail','Incorrect email or password');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('welcome-page');
    }

    public function showadminlogin()
    {
        return view('dashboard.admin.login');
    }

}
