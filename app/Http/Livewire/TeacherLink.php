<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Course;

class TeacherLink extends Component
{

    public $vdlink,$crs_id,$month;
    protected $listeners=['delete'];

    public function render()
    {
        $user = Auth::guard('teacher')->id();
        $courses = Course::where('teacher_id',$user)->get();
       
        return view('livewire.teacher-link',[
            'courses'=>$courses
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
            'month'=>'required'
        ]);

        $crs_id = $this->crs_id;
        $update = Course::find($crs_id)->update([
            'Links'=>$this->vdlink,
            'month'=>$this->month
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
        $del = Course::where('id',$id)->where('Links','like',$info->Links)->where('month','like',$info->month)->first();
        if($del){

            $del->update(['Links' => null,'month'=>null]);
            $this->dispatchBrowserEvent('deleted');
        }
    }
}
