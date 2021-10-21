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
    public $courseid;
    public $up_name,$up_description;

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
            'photo'=>'image|max:3048'
            
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

    public function OpenEditCourseModal($id)
    {
        $info = Course::find($id);
        $this->up_name = $info->Name;
        $this->up_description = $info->description;
        $this->courseid = $info->id;
        $this->dispatchBrowserEvent('OpenEditCourseModal',[
            'id'=>$id
        ]);
    }

    public function update()
    {
        $this->validate([
            'up_name'=>'required',
            'up_description'=>'required'
        ]);

        $update = Course::find($this->courseid)->update([
            'Name'=>$this->up_name,
            'description'=>$this->up_description
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCourse');
        }
    }

   
}
