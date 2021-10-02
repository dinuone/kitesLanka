<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Course;

class StudCourseCount extends Component
{
    public function render()
    {
        $courses = Course::withCount(['students'])->get(); 
        return view('livewire.stud-course-count',compact('courses'));
    }
}
