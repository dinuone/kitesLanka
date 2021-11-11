<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course; //
use App\Models\Material;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;
use File;


class CourseMaterialsController extends Controller
{
    public function index()
    {
        $files = Material::paginate(10);
        $courses = Course::all();
        return view('dashboard.admin.materials',[
            'courses'=>$courses,
            'files'=>$files
        ]);
    }


    public function download($file_name)
    {
        
        return response()->download(storage_path('app/public/pdf'.$file_name));
        
    }

    public function Removefilles($file_name)
    {
        if(File::exists(public_path('storage/'.$file_name))){
            File::delete(public_path('storage/'.$file_name));
            Material::where('file_name',$file_name)->delete();
            return back()->with('delete','File has been Deleted.');
           
        }else{

            return back()->with('fail','The file does not exsits!.');
        }


    }
  
}
