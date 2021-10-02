<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
       'id',
       'title',
       'body',
       'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'id');
    }
}
