<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Student;
use Mail;
use Hash;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function showForgetPasswordFrom()
    {
        return view('auth.passwords.email');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'=> $request->email,
            'token'=> $token,
            'created_at'=>Carbon::now()
        ]);

        Mail::send('email.forgetPassword',['token'=>$token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message','We have E-mailed your password reset Link');
    }


    public function showResetPasswordForm($token)
    {
        return view('auth.passwords.reset',['token'=>$token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:students',
            'password'=>'required|string|min:6|confirmed',
            'password_confirmation'=>'required'
        ]);

        $updatePassword = DB::table('password_resets')->where([
                                'email'=>$request->email,
                                'token'=>$request->token
                            ])->first();

        if(!$updatePassword){
            return back()->withInput()->with('error','Invalid Token!');
        }

        $student = Student::where('email',$request->email)->update([
                'password'=>Hash::make($request->password)
        ]);

        DB::table('password_resets')->where(['email'=>$request->email])->delete();

        return redirect('/student/login')->with('message','your password has been changed');
    
    }
}
