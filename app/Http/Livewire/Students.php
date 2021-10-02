<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Course;
use App\Helpers\Helper;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    public $fullname,$dob,$contact,$whatsapp,$address,$school,$email,$std;
    public $course = [];

    public $bycourse = null;
    public $perPage=5;
    public $orderBy = 'created_at';
    public $sortBy = 'asc';
    public $search;

    

    public function render()
    {
        $students = Student::latest()->paginate(5);
        $courses = Course::all();
        return view('livewire.students',[
            'courses'=>$courses,
            'students'=>Student::when($this->bycourse, function($query){
                $query->where('id', $this->bycourse);
            })
            ->search(trim($this->search))
            ->orderBy($this->orderBy,$this->sortBy)
            ->paginate($this->perPage)
        ]);

    }

    public function OpenAddStudentModal()
    {
        $this->dispatchBrowserEvent('OpenAddStudentModal');
    }

    public function save()
    {
        $this->validate([
            'fullname'=>'required',
            'dob'=>'required',
            'contact'=>'required|unique:students',
            'whatsapp'=>'required',
            'address'=>'required',
            'email'=>'required|unique:students',
           
            
        ]);

        $user = new Student(); 
        $this->std = Helper:: IDgenerator($user,'student_id',5,'KTL');
        
            $user->FullName = $this->fullname;
            $user->date_of_birth = $this->dob;
            $user->contact_whatsapp = $this->whatsapp;
            $user->contact = $this->contact;
            $user->address = $this->address;
            $user->email = $this->email;
            $user->school = $this->school;
            $user->password = '$2y$10$7ix6e/tLHYOPYt8xwP/12uh6fouRIQd7IUZOzZXkU41cvzZjYdMsm';
            $user->student_id = $this->std;

            $save = $user->save();

            $selectcourse = $this->course; //get checkbox values

            $crs = Course::find($selectcourse);
            $user->courses()->attach($crs);

        if($save){
            $this->dispatchBrowserEvent('CloseStudentModal');
        }
    }
}
