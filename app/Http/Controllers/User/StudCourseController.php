<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class StudCourseController extends Controller
{
    public function index()
    {   
        return view('dashboard.user.myclass');
    }
}
