<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course; //
use App\Models\Material;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;
use File;


class CourseMaterialsController extends Controller
{
   public $getfilename;

    public function index()
    {
        $files = Material::paginate(10);
        $courses = Course::all();
        return view('dashboard.admin.materials',[
            'courses'=>$courses,
            'files'=>$files
        ]);
    }

    public function uploadfile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:10000',
            'month'=>'required',
            'course'=>'required'
        ]);

     

            $data = new Material();
            $filename = $request->file->getClientOriginalName();
  
            // $filepath = $request->file('file')->storeAs('pdf', $filename, 'public');
            Storage::disk('local')->put($filename, 'pdf');
            $data->course_id = $request->course;
            $data->file_name = $filename;
            $data->month = $request->month;
            $data->save();

            return back()->with('success','File has uploaded to the database.');
    
        
    }


    public function downloadfile($filename)
    {
        
        return Storage::download($filename);
        
    }

    public function Removefilles($id)
    {
    
        


    }
  
}
