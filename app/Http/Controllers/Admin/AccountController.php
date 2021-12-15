<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.account-setting');
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
