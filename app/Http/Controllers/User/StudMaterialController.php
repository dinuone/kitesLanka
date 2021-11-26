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
        $file = Storage::disk('public')->get($filename);

        return (new Response($file,200))
            ->header('Content-Type','pdf');
        
    }
}
