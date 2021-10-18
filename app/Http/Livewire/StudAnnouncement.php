<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Announcement;

class StudAnnouncement extends Component
{
    public $course,$title,$msg,$payment;

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
}
