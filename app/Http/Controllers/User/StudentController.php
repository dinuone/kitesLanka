<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
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
            'school'=>'required',
            'address'=>'required'
        ]);

        $user = new Student(); 

        $student_id = Helper:: IDgenerator($user,'student_id',5,'KTL');

        $user->student_id = $student_id;
        $user->FullName = $request->fullname;
        $user->date_of_birth = $request->dob;
        $user->contact_whatsapp = $request->contact1;
        $user->contact = $request->contact2;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->school = $request->school;
        $user->password = '$2y$10$7ix6e/tLHYOPYt8xwP/12uh6fouRIQd7IUZOzZXkU41cvzZjYdMsm';
        $save = $user->save();

       if($save){
           return redirect()->back()->with('success','You are now registerd successfully');
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
            return redirect()->route('student.home');
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
