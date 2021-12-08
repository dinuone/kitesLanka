<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course; 
use App\Models\Material;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class TeacherPDFController extends Controller
{
    public function index()
    {
        $userid = Auth::guard('teacher')->id();
        $files = Material::paginate(10);
        $courses = Course::where('teacher_id',$userid)->get();
        return view('dashboard.teacher.material',[
            'courses'=>$courses,
            'files'=>$files
        ]);
    }

    public function uploadfile(Request $request)
    {
        $request->validate([
            'material.*' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,pptx|max:10000',
            'month'=>'required',
            'course'=>'required'
        ]);

     
        if($request->hasfile('material')){
            foreach($request->file('material') as $file)
            {
                $filename = $file->getClientOriginalName();
                // $filepath = $request->file('file')->storeAs('pdf', $filename, 'public');
                Storage::disk('local')->put($filename, 'pdf');
                $file = new Material();
                $file->course_id = $request->course;
                $file->file_name = $filename;
                $file->month = $request->month;
                $file->save();
            }

            

            return back()->with('success','File has uploaded to the database.');
        }
            

    }


    public function downloadfile($filename)
    {
        
        return Storage::download($filename);
        
    }

    public function Removefilles($id)
    {
    
        $checkfile = Material::select('id','file_name')->where('id','=',$id)->get();
        foreach($checkfile as $file)
        {
           $materialName = $file->file_name;
           if(Storage::exists($materialName)){
               Storage::delete($materialName);
           }
           else
           {
            return back()->with('fail','File does not exists in server!.');
           }

           $delete = Material::find($id)->delete();
           if($delete){
            return back()->with('success','File has been Deleted!.');
           }
           
        }
    }

}
