<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;

class AdminCourseController extends Controller
{
    public function index()
    {
        $studcount = Course::withCount(['students'])->get(); 
        $courses = Course::select('id','Name','teacher_id','description','large_desc','class_fee','admission_fee')->paginate(5);
        $teachers = Teacher::Select('id','fullname')->get();
        return view('dashboard.admin.classes',[
            'courses'=>$courses,
            'teachers'=>$teachers,
            'studcount'=>$studcount
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'courseName'=>'required',
            'teacher'=>'required',
            'description'=>'required',
            'classfee'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'photo'=>'image|max:3048',
        ]);

        $crs = new Course();
        $crs->Name = $request->courseName;
        $crs->image_path = $request->photo->store('images', 'public');
        $crs->large_desc = $request->large_description;
        $crs->description = $request->description;
        $crs->class_fee = $request->classfee;
        $crs->teacher_id = $request->teacher;
        $crs->admission_fee = $request->admission_fee;
        
        $save = $crs->save();

        if($save){
            return back()->with('success','New course Added!');
        }
    }

    public function edit($id)
    {
        $teachers = Teacher::Select('id','fullname')->get();
        $info =Course::where('id',$id)->get();
        return view('dashboard.admin.editcouse',[
            'teachers'=>$teachers,
            'info'=>$info
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'courseName'=>'required',
            'teacherName'=>'required',
            'description'=>'required',
            'classfee'=>'required',

        ]);

        $courseid = $request->course_id;
        $update = Course::find($courseid)->update([
            'teacher_id'=>$request->teacherName,
            'Name'=>$request->courseName,
            'description'=>$request->description,
            'large_desc'=>$request->large_description,
            'class_fee'=>$request->classfee,
            'admission_fee'=>$request->admission_fee,
            'image_path'=>$request->photo->store('images', 'public'),
        ]);

        if($update){
            return back()->with('update','Course Details Updated');
        }
    }

    public function delete($id)
    {
        Course::where('id',$id)->delete();
        return back();
    }
}
