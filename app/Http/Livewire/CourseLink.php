<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CourseLink extends Component
{
    use WithPagination;

    public $vdlink,$crs_id;

    public function render()
    {
        $courses = Course::all();
        return view('livewire.course-link',[
            'courses'=>$courses,

        ]);
    }

    
    public function OpenAddLinkModal($id)
    {
        $info = Course::find($id);
        $this->crs_id = $info->id;
        $this->dispatchBrowserEvent('OpenAddLinkModal',[
            'id'=>$id
        ]);
    }

    public function save()
    {
        $this->validate([
            'vdlink'=>'required',
            
        ]);

        $crs_id = $this->crs_id;
        $update = Course::find($crs_id)->update([
            'Links'=>$this->vdlink,
        ]);
        
        
        if($update)
        {
            $this->dispatchBrowserEvent('CloseEditCourseModal');
        }
        
          
    }
    
}
