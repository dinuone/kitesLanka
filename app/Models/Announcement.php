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
       'course_id',
       'payment_status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
