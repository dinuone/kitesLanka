<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'st_id',
        'st_fullname',
        'st_email',
        'feedback',
        'created_at'
        
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'st_id');
    }
}
