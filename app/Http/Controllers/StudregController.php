<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class StudregController extends Controller
{
    public function index($id)
    {
        $courseid = $id;
        return view('dashboard.user.register',[
            'courseid'=>$courseid
        ]);
    }

    public function show()
    {
        return view('dashboard.user.sign-up');
    }

   
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
        
        if($save){
            return redirect()->route('student-login')->with('success',$student_id);
        }else{
            return redirect()->back()->with('fail','Something went wrong, fialed to register');
        }
    }
    
}
