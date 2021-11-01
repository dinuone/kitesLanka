<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'st_id',
        'course_id',
        'attend',
        'created_at',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','FullName');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
