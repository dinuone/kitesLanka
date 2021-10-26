<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.classes');
    }
}
