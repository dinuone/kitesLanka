<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
use Illuminate\Support\Facades\Response;

class ViewPDFCOntroller extends Controller
{
    public function viewpdf($id)
    {
        $info = Payment::find($id);
        $filepath = $info->pdf_file;

        $path= public_path('/storage/'.$filepath);
        
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filepath . '"'
          ];

       return response()->file($path, $header);
        
    }

    public function teacherviewpdf($id)
    {
        $info = Payment::find($id);
        $filepath = $info->pdf_file;

        $path= public_path('/storage/'.$filepath);
        
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filepath . '"'
          ];

       return response()->file($path, $header);
    }
}
