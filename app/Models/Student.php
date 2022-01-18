<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'student_id',
        'FullName',
        'date_of_birth',
        'contact_whatsapp',
        'contact',
        'address',
        'email',
        'school',
        'password',
        'id',
        'payment_status',
        'created_at',
        'updated_at',
        'last_seen'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_student');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}


