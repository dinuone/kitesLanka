<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StudMaterialController extends Controller
{
    public function index()
    {
        return view('dashboard.user.Materials');
    }

    public function download($filename)
    {
        return Storage::download($filename);
        
    }
}
