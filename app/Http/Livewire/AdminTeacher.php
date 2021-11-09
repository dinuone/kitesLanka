<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Teacher;
use App\Models\Course;
use Livewire\WithFileUploads;

class AdminTeacher extends Component
{
    use WithFileUploads;
    protected $listeners=['delete'];
    public $teachername,$contact,$email,$photo;
    public $up_teachername,$up_contact,$up_email,$teacherID;
    public $up_photo='';

    public function render()
    {
        $teachers = Teacher::Select('id','fullname','contact','email','created_at')->get();
        return view('livewire.admin-teacher',[
            'teachers'=>$teachers
        ]);
    }

    public function OpenAddTeacherModal()
    {
        $this->dispatchBrowserEvent('OpenAddTeacherModal');
    }

    public function save()
    {
        $this->validate([
            'teachername'=>'required',
            'contact'=>'required|unique:teachers',
            'email'=>'required|unique:teachers',
            'photo'=>'image|max:3048',
        ]);

            $user = new Teacher(); 
            $user->fullname = $this->teachername;
            $user->contact = $this->contact;
            $user->email = $this->email;
            $user->image_path = $this->photo->store('teacher_img', 'public');
            $user->password = '$2y$10$7ix6e/tLHYOPYt8xwP/12uh6fouRIQd7IUZOzZXkU41cvzZjYdMsm';
            $save = $user->save();

        if($save){
            $this->dispatchBrowserEvent('CloseTeacherModal');
        }
    }

    public function EditTeacherModal($id)
    {
        $info = Teacher::find($id);
        $this->up_teachername = $info->fullname;
        $this->up_contact = $info->contact;
        $this->up_email = $info->email;
        $this->teacherID = $info->id;
        $this->dispatchBrowserEvent('EditTeacherModal',[
            'id'=>$id
        ]);
    }

    public function update()
    {
        $tID = $this->teacherID;
        $this->validate([
            'up_teachername' => 'required',
            'up_contact' => 'required',
            'up_email' => 'required',
            'up_photo' =>'required|max:3048'
        ]);
        $update = Teacher::find($tID)->update([
            'fullname'=>$this->up_teachername,
            'contact'=>$this->up_contact,
            'email'=>$this->up_email,
            'image_path'=>$this->up_photo->store('teacher_img','public')
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEdiTeacherModal');
        }
    }

    public function DeleteTeacher($id)
    {
        $info = Teacher::find($id);
        $this->dispatchBrowserEvent('swalconfirm',[
            'title'=>'Are You Sure?',
            'id'=>$id
        ]);
    }

    public function delete($id)
    {
        $del = Teacher::find($id)->delete();
        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
    }
}
