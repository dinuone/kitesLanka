<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CourseLink extends Component
{
    use WithPagination;

    public $vdlink,$crs_id,$month;
    protected $listeners=['delete','deleterec'];

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

    public function OpenRecLink($id)
    {
        $info = Course::find($id);
        $this->crs_id = $info->id;
        $this->dispatchBrowserEvent('OpenAddRecLinkModal',[
            'id'=>$id
        ]);
    }

    public $rec_link,$rec_month;
    public function saveRecLink()
    {
        $this->validate([
            'rec_link'=>'required',
            'rec_month'=>'required'
        ]);

        $crs_id = $this->crs_id;
        $update = Course::find($crs_id)->update([
            'record_link'=>$this->rec_link,
            'record_link_month'=>$this->rec_month
        ]);
        
        
        if($update)
        {
            $this->dispatchBrowserEvent('CloseRecModal');
        }
    }

    
    public function DeleteRecLink($id)
    {
        $info = Course::find($id);
        $this->dispatchBrowserEvent('swalconfirmRec',[
            'title'=>'Are You Sure?',
            'id'=>$id
        ]);
    }

    public function deleterec($id)
    {
        
        $info = Course::find($id);
        $del = Course::where('id',$id)->where('record_link_month','like',$info->record_link_month)->where('record_link','like',$info->record_link)->first();
        if($del){

            $del->update(['record_link' => null,'record_link_month'=>null]);
            $this->dispatchBrowserEvent('deleted_rec');
        }
    }


    
}
