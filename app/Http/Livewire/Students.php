<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Course;
use App\Helpers\Helper;
use Livewire\WithPagination;

use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public $selected=[]; 
    public $selectAll = false;

    public $up_fullname,$up_dob,$up_contact,$up_whatsapp,$up_address,$up_school; //update modal vairables
    public $up_course=[];

    protected $listeners=['delete','deletecheckedtudents','resetstud'];

    //returen view 
    public function render()
    {
        $students = Student::latest()->paginate(5);
        $courses = Course::Select('id','Name')->get();
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

    //save student
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
        $this->std = random_int(1000, 9999);
        
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

    //update module 
    public function OpenEditModal($id)
    {
        $info = Student::find($id);
        $this->up_fullname = $info->FullName;
        $this->up_contact = $info->contact;
        $this->up_whatsapp = $info->contact_whatsapp;
        $this->up_address = $info->address;
        $this->up_dob = $info->date_of_birth;
        $this->up_school = $info->school;
        $this->std = $info->id;
        $this->dispatchBrowserEvent('OpenEditModal',[
            'id'=>$id
        ]);
    }

    public function update()
    {
        $studid = $this->std;
        $this->validate([
            'up_fullname'=>'required',
            'up_contact'=>'required',
            'up_whatsapp'=>'required',
            'up_address'=>'required',
            'up_course'=>'required'
        ]);

        $update = Student::find($studid)->update([
           ' FullName'=>$this->up_fullname,
            'contact'=>$this->up_contact,
            'contact_whatsapp'=>$this->up_whatsapp,
            'address'=>$this->up_address,
            'date_of_birth'=>$this->up_dob,
            'school'=>$this->up_school,
        ]);

        $student = Student::find($this->std);
        $student->courses()->sync($this->up_course);

        if($update){
            $this->dispatchBrowserEvent('CloseEditStudent');
        }
    }

    //dlete sutdents
    public function deleteStudent($id)
    {
        $info = Student::find($id);
        $this->dispatchBrowserEvent('swalconfirm',[
            'title'=>'Are you Sure?',
            'id'=>$id
        ]);
    }

    public function delete($id)
    {
        $del = Student::find($id)->delete();
        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
    }

    public function deleteStudents()
    {
        $this->dispatchBrowserEvent('swal:deleteStudents',[
            'title'=>'Are you Sure?',
            'html'=>'you want to delete this students',
            'checkedIDS'=>$this->selected,
        ]);
    }

    public function deletecheckedtudents($ids)
    {
        Student::whereKey($ids)->delete();
        $this->selected = [];
    }

    //update student status 
    public function resetstudStatus()
    {
        $this->dispatchBrowserEvent('swal:resetstudent',[
            'title'=>'Are you Sure?',
            'html'=>'you want to reset student status please make sure students payments status change <strong> end of the month</strong>',
            'checkedIDS'=>$this->selected,
        ]);
    }

    public function resetstud($ids)
    {
        
        $update = Student::whereKey($ids)->update([
            'payment_status'=>0,
        ]);
        $this->selected =[];
    }


    //chekboxes select all
    public function updatedSelectAll($value)
    {
        if($value){
            $this->selected = Student::pluck('id');
        }
        else{
            $this->selected = [];
        }
    }

    //export reports 
    public function export()
    {
        return (new StudentExport ($this->selected))->download('students-detials.xls'); 
      
    }
}
