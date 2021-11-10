<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\material;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;


class CourseMaterialsController extends Controller
{
    public function index()
    {
        $files = material::paginate(10);
        $courses = Course::all();
        return view('dashboard.admin.materials',[
            'courses'=>$courses,
            'files'=>$files
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:10000',
            'course'=>'required'
        ]);
    
        $data = new material();
        $file = $request->file;
        $filename = time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        
        $data->course_id = $request->course;
        $data->file_name = $filename;
        $data->save();

            
        return back()->with('success','File has uploaded to the database.');
        
    }

    public function download($file_name)
    {
        $path = public_path('storage/'.$file_name);
        return response()->download($path);
        
    }

    public function destroy($id)
    {
        dd($id);
    }
  
}
