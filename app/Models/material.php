<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'course_id',
        'path',
        'file_name',
        'created_at',
        'month'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}

?>
