<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Announcement;

class StudAnnouncement extends Component
{
    public $course,$title,$msg,$payment;
    public $up_course,$up_title,$up_msg,$up_payment;
    public $ancid;

    protected $listeners=['delete'];
    
    public function render()
    {
        $courses = Course::all();
        $announce = Announcement::all();
        return view('livewire.stud-announcement',[
            'courses'=>$courses,
            'announce'=>$announce
        ]);
    }

    public function OpenAnnouncementModal()
    {
        $this->dispatchBrowserEvent('OpenAnnouncementModal');
    }

    public function save()
    {
        $this->validate([
            'title'=>'required',
            'msg'=>'required',
            'course'=>'required',
            'payment'=>'required'
            
        ]);

        $announcement = new Announcement();
        $announcement->title = $this->title;
        $announcement->body = $this->msg;
        $announcement->course_id = $this->course;
        $announcement->payment_status = $this->payment;

        $save = $announcement->save();
        if($save)
        {
            $this->dispatchBrowserEvent('CloseAnnouncementModal');
        }
    }

    public function OpenEditModal($id)
    {
        $info = Announcement::find($id);
        $this->up_course = $info->course_id;
        $this->up_title = $info->title;
        $this->up_msg = $info->body;
        $this->up_payment = $info->payment_status;
        $this->ancid = $info->id;

        $this->dispatchBrowserEvent('OpenEditModal',[
            'id'=>$id
        ]);
        
    }

    public function update()
    {
        $annnounceid = $this->ancid;
        $this->validate([
            'up_course'=>'required',
            'up_title'=>'required',
            'up_msg'=>'required',
            'up_payment'=>'required',

        ]);

        $update = Announcement::find($annnounceid)->update([
            'course_id'=>$this->up_course,
            'title'=>$this->up_title,
            'body'=>$this->up_msg,
            'payment_status'=>$this->up_payment
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditModal');
        }
    }

    public function DeleteAnnouncement($id)
    {
        $info = Announcement::find($id);
        $this->dispatchBrowserEvent('swalconfirm',[
            'title'=>'Are You Sure?',
            'id'=>$id
        ]);

    }

    public function delete($id)
    {
        $del = Announcement::find($id)->delete();
        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
    }
}
