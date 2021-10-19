<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Student;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Courses extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name;
    public $stud_name,$std_id,$crs_id,$photo,$description;

    public function render()
    {
        $courses = Course::latest()->paginate(3);
        $students = Student::all();
        return view('livewire.courses',[
            'courses'=>$courses,
            'students'=>$students,
        ]);
    }

  

    public function OpenAddCourseModal()
    {
        $this->dispatchBrowserEvent('OpenAddCourseModal');
    }
    
   

    public function save()
    {
        $this->validate([
            'name'=>'required|unique:courses',
            'description'=>'required',
            'photo'=>'image|max:2048'
            
        ]);

        $crs = new Course();
        $crs->Name = $this->name;
        $crs->image_path = $this->photo->store('images', 'public');
        $crs->description = $this->description;
        $save = $crs->save();
       
        if($save)
        {
            $this->dispatchBrowserEvent('CloseCourseModal');
        }
        
          
    }

   
}
