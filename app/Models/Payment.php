<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'id',
        'st_id',
        'student_id',
        'course_id',
        'payment_status',
        'image_path',
        'created_at',
        'amount',
        'ref_number',
        'month',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class,'st_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'id');
    }
}


