<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Teacher;
use Carbon\Carbon;
use DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index()
    {
        $studdata = Student::select(DB::raw("COUNT(*) as count"))
                    ->whereYear("created_at",date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        
        $duecount = Student::where('payment_status','=',0)->count();
        $studToday = Student::whereDate('created_at', Carbon::today())->get()->count();
        $studcount = Student::count();
        $teachercount = Teacher::count();
        $courseCount = Course::all()->count();
        
        $income = Payment::where('payment_status','=','1')->whereMonth('created_at',Carbon::now()->month)->sum('amount');
        
        $chart_options = [
            'chart_title' => 'Students Registration by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Student',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'chart_color'=>'46,176,232'
        ];
        $chart1 = new LaravelChart($chart_options);

        //2nd chart
        $chart_options = [
            'chart_title' => 'This Month Income',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Payment',

            'relationship_name'=>'course',
            'group_by_field' => 'Name',
            
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'where_raw'=>'payment_status=1',

            'filter_field'=>'created_at',
            'filter_period'=>'month',
            'chart_type' => 'bar',
            'chart_color'=>'174,63,222'
        ];
        $chart2 = new LaravelChart($chart_options);

        return view('dashboard.admin.home',[
            'studToday'=>$studToday,
            'duecount'=>$duecount,
            'studdata'=>$studdata,
            'courseCount'=>$courseCount,
            'studcount'=>$studcount,
            'teachercount'=>$teachercount,
            'income'=>$income
        ],compact('chart1','chart2'));
    }

    public function showtoday()
    {
        return view('dashboard.admin.StudTodayReg');
    }

    public function showavbCourse()
    {
        $courses = Course::Select('id','Name')->get();
        return view('dashboard.admin.avb-course',[
            'courses'=>$courses
        ]);
    }

    public function coursestud($id)
    {
        $course = Course::find($id);
        $selectcourse = Course::where('id',$id)->get();
        $students = $course->students()->paginate(5);
        return view('dashboard.admin.course-stud',[
            'students'=>$students,
            'selectcourse'=>$selectcourse
        ]);
    }
}
