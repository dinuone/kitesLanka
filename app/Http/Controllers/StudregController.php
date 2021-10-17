<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class StudregController extends Controller
{
    public function index($id)
    {
        $courseid = $id;
        return view('dashboard.user.register',[
            'courseid'=>$courseid
        ]);
    }
}
