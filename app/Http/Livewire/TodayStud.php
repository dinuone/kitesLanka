<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Carbon\Carbon;
use Livewire\WithPagination;

class TodayStud extends Component
{
    use WithPagination;

    public function render()
    {
    
        $studlist = Student::whereDate('created_at', Carbon::today())->latest()->paginate(6);
        return view('livewire.today-stud',[
            'studlist'=>$studlist
        ]);
    }
}
