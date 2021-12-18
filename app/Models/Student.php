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
        'updated_at'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_student');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('FullName','like', $term)
                    ->orWhere('student_id','like',$term)
                    ->orWhere('date_of_birth','like',$term)
                    ->orWhere('contact','like',$term)
                    ->orwhere('email','like',$term)
                    ->orwhere('school','like',$term)
                    ->orwhere('address','like',$term)
                    ->orwhere('contact_whatsapp','like',$term);
            
        });
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


