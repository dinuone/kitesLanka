<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Teacher;

use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Courses extends Component
{
    use WithPagination;
    use WithFileUploads;

    
    public $name,$photo,$description,$courseid,$teacher;
    public $up_name,$up_description,$up_teacher,$up_photo;

    public function render()
    {
        $courses = Course::select('id','Name','teacher_id')->paginate(3);
        $teachers = Teacher::Select('id','fullname')->get();
        return view('livewire.courses',[
            'courses'=>$courses,
            'teachers'=>$teachers
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
            'photo'=>'image|max:3048',
            'teacher'=>'required'
            
        ]);

        $crs = new Course();
        $crs->Name = $this->name;
        $crs->image_path = $this->photo->store('images', 'public');
        $crs->description = $this->description;
        $crs->teacher_id = $this->teacher;
        
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
        $this->up_teacher = $info->teacher_id;
        $this->courseid = $id;
        $this->up_photo = $info->image_path;
        $this->dispatchBrowserEvent('OpenEditCourseModal',[
            'id'=>$id
        ]);
    }

    public function update()
    {
        $id = $this->courseid;
        $this->validate([
            'up_name'=>'required',
            'up_description'=>'required',
            'up_teacher'=>'required',
        ]);

        $update = Course::find($id)->update([
            'Name'=>$this->up_name,
            'description'=>$this->up_description,
            'teacher_id'=>$this->up_teacher,
            'image_path'=>$this->up_photo->store('images', 'public'),
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCourse');
        }
    }

   
}
