<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function create(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'dob'=>'required',
            'contact2'=>'required|max:10|unique:students,contact',
            'contact1'=>'required|max:10|unique:students,contact_whatsapp',
            'email'=>'required|unique:students,email',
            'password'=>'required|string|confirmed|min:8',
            'address'=>'required',
        ]);

        $user = new Student(); 

        $student_id = random_int(1000, 9999);
    

        $user->student_id = $student_id;
        $user->FullName = $request->fullname;
        $user->date_of_birth = $request->dob;
        $user->contact_whatsapp = $request->contact1;
        $user->contact = $request->contact2;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->school = $request->school;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        $crs = Course::find($request->course);
        $user->courses()->attach($crs);

       if($save){
         return redirect()->back()->with('success',$student_id);
       }else{
           return redirect()->back()->with('fail','Something went wrong, fialed to register');
       }
    }

    public function check(Request $request)
    {
        $request->validate([
            'student_id'=>'required',
            'password'=>'required'
        ]);

        $creds = $request->only('student_id','password');
        if(Auth::guard('student')->attempt($creds)){
            return redirect()->route('student-home');
        }else{
            return redirect()->back()->with('fail','Incorrect Username or Password');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
