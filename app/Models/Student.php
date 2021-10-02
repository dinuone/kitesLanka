<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
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
        'payment_status'
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
                    ->orWhere('student_id','like',$term);
            
        });
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

?>
