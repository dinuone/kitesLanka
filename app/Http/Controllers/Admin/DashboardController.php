<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $studdata = Student::select(DB::raw("COUNT(*) as count"))
                    ->whereYear("created_at",date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        $income = Payment::select(DB::raw("SUM(amount) as total"))
                    ->whereYear("created_at",date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('total');
       
        $duecount = Student::where('payment_status','=',0)->count();
        $studToday = Student::whereDate('created_at', Carbon::today())->get()->count();
        return view('dashboard.admin.home',[
            'studToday'=>$studToday,
            'duecount'=>$duecount,
            'studdata'=>$studdata,
            'income'=>$income
        ]);
    }

    public function showtoday()
    {
        return view('dashboard.admin.StudTodayReg');
    }
}
