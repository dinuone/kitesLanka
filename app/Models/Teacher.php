<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fullname',
        'contact',
        'email',
        'password',
        'image_path',
        'created_at',
        'updated_at'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class,'id');
    }
 
}
