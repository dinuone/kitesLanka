<?php

namespace App\Http\Livewire\AdminStudent;

use Livewire\Component;
use App\Models\Student;
use App\Models\Course;
use App\Helpers\Helper;
use Livewire\WithPagination;

use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentManage extends Component
{
    use WithPagination;

    public $fullname,$dob,$contact,$whatsapp,$address,$school,$email,$std;
    public $course = [];
    public $search;
    public $filtercourse;
    public $selected=[]; 
    public $selectAll = false;

    public $upfullname,$updob,$upcontact,$upwhatsapp,$upaddress,$upschool,$upemail; //update modal vairables
    public $upcourse=[];

    protected $listeners=['delete','deletecheckedtudents','resetstud'];


    public function render()
    {
        $students = Student::latest()->paginate(100);
        $courses = Course::Select('id','Name')->get();
        $filterdata = Student::whereHas('courses',function($query){
            $query->whereIn('course_id',[$this->filtercourse]);
     })->get();

        return view('livewire.admin-student.student-manage',[
            'students'=> Student::when($this->search, function($query,$search){
                return $query->where('FullName','like',"%$search%")
                    ->orWhere('student_id','like',"%$search%")
                    ->orWhere('date_of_birth','like',"%$search%")
                    ->orWhere('contact','like',"%$search%")
                    ->orwhere('email','like',"%$search%")
                    ->orwhere('school','like',"%$search%")
                    ->orwhere('address','like',"%$search%")
                    ->orwhere('contact_whatsapp','like',"%$search%");
            })->paginate(100),
            
            'courses'=>$courses,
            'filterdata'=>$filterdata
        ]);
    }

     //update module 
     public function OpenEditStudentModal($id)
     {
         $info = Student::find($id);
         $this->upfullname = $info->FullName;
         $this->upcontact = $info->contact;
         $this->upwhatsapp = $info->contact_whatsapp;
         $this->upaddress = $info->address;
         $this->updob = $info->date_of_birth;
         $this->upschool = $info->school;
         $this->upemail = $info->email;
         $this->std = $id;
         $this->dispatchBrowserEvent('OpenEditStudentModal',[
             'id'=>$id
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

    public function update()
    {
        $studid = $this->std;
        $this->validate([
            'upfullname'=>'required',
            'upcontact'=>'required',
            'upwhatsapp'=>'required',
            'upaddress'=>'required',
            'upcourse'=>'required'
        ]);

        $update = Student::find($studid)->update([
            'FullName'=>$this->upfullname,
            'contact'=>$this->upcontact,
            'contact_whatsapp'=>$this->upwhatsapp,
            'address'=>$this->upaddress,
            'date_of_birth'=>$this->updob,
            'school'=>$this->upschool,
            'email'=>$this->upemail,
        ]);

        $student = Student::find($this->std);
        $student->courses()->sync($this->upcourse);

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
