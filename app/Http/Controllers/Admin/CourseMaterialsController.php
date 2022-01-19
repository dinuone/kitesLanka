<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course; //
use App\Models\Material;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
use Illuminate\Support\Facades\Response;


class CourseMaterialsController extends Controller
{
   public $getfilename;

    public function index()
    {
        $files = Material::Latest()->paginate(100);
        $courses = Course::all();
        return view('dashboard.admin.materials',[
            'courses'=>$courses,
            'files'=>$files
        ]);
    }

    public function uploadfile(Request $request)
    {
        $request->validate([
            'material.*'=>'mimes:doc,pdf,docx',
            'month'=>'required',
            'course'=>'required'
        ]);

     
        if($request->hasfile('material')){
            foreach($request->file('material') as $file)
            {
                $filename = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/',$filename);
                
                $file = new Material();
                $file->course_id = $request->course;
                $file->file_name = $filename;
                $file->month = $request->month;
                $file->save();
            
            }

           

            return back()->with('success','File has uploaded to the database.');
        }
            

    }


    public function viewpdf($id)
    {
        
        $info = Material::find($id);
        $filepath = $info->file_name;

        $path= public_path('/uploads/'.$filepath);
        
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filepath . '"'
          ];

       return response()->file($path, $header);
        
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
          

           $delete = Material::find($id)->delete();
           if($delete){
            return back()->with('success','File has been Deleted!.');
           }
           
        }


    }
  
}
