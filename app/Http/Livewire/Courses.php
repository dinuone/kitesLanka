<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Student;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;

    public $name;
    public $stud_name,$std_id,$crs_id;

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
            
        ]);

        $crs = new Course();
        $crs->Name = $this->name;

        $save = $crs->save();
       
        if($save)
        {
            $this->dispatchBrowserEvent('CloseCourseModal');
        }
        
          
    }

   
}
