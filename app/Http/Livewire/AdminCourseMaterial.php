<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Material;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminCourseMaterial extends Component
{
    use WithFileUploads;

    public $material = [];
    public $month;
    public $course;

    public function render()
    {
        $files = Material::paginate(10);
        $courses = Course::all();
        return view('livewire.admin-course-material',[
            'courses'=>$courses,
            'files'=>$files
        ]);
    }

    public function save()
    {
        $this->validate([
            'material.*' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:10000',
            'month'=>'required',
            'course'=>'required'
        ]);

     
        foreach($this->material as $pdf)
        {
            $data = new Material();
            $filename = $pdf->getClientOriginalName();
  
            $pdf->storeAs('public',$filename);
            $data->course_id = $this->course;
            $data->file_name = $filename;
            $data->month = $this->month;
            $data->save();
        }
        
      
    }
}
