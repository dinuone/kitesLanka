<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CourseLink extends Component
{
    use WithPagination;

    public $vdlink,$crs_id;
    protected $listeners=['delete'];

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

    public function DeleteCourseLink($id)
    {
        $info = Course::find($id);
        $this->dispatchBrowserEvent('swalconfirm',[
            'title'=>'Are You Sure?',
            'id'=>$id
        ]);
    }

    public function delete($id)
    {
        
        $info = Course::find($id);
        $del = Course::where('id',$id)->where('Links','like',$info->Links)->first();
        if($del){

            $del->update(['Links' => null]);
            $this->dispatchBrowserEvent('deleted');
        }
    }

    
}
