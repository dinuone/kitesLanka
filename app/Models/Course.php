<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
       'id',
       'teacher_id',
       'Name',
       'Links',
       'image_path',
       'description',
       'created_at',
       'update_at'
       
    ];

    
    public function students()
    {
        return $this->belongsToMany(Student::class,'course_student');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    
   
}
