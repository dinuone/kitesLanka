<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Teacher;
use App\Models\Course;
use Livewire\WithFileUploads;

class AdminTeacher extends Component
{
    use WithFileUploads;

    public $teachername,$contact,$email,$photo;

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
            'teacher'=>'required'
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
}
