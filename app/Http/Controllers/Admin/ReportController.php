<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use App\Models\Payment;
use DB;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ReportController extends Controller
{
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Student',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
        ];
                    

        $chart1 = new LaravelChart($chart_options);
        
        return view('dashboard.admin.AdminReport', compact('chart1'));

    }

}
