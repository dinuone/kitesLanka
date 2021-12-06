<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\StudentController;
use App\Http\Controllers\User\StudDashController;
use App\Http\Controllers\User\StudCourseController;
use App\Http\Controllers\StudregController;
use App\Http\Controllers\User\StudMaterialController;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CourseController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\announcement;
use App\Http\Controllers\Admin\DuepaymentController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\CourseMaterialsController;
use App\Http\Controllers\Admin\ReportController;

use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\MyClassController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Teacher\CoursePDFcontroller;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);

//student:guest-------------------------------------------------------
Route::view('student/login','dashboard.user.login')->name('student-login');
Route::get('student/register/{id}',[StudregController::class,'index'])->name('student-register');
Route::post('student/create',[StudentController::class,'create'])->name('student-create');
Route::post('student/check',[StudentController::class,'check'])->name('student-check');
Route::get('student/courses',[CourseController::class,'index'])->name('student-course');
Route::get('student/course/{id}',[CourseController::class,'selectcourse'])->name('student-select-course');
Route::get('student/teacher/{id}',[CourseController::class,'selectteacher'])->name('student-select-teacher');

//student:auth-------------------------------------------------------------
Route::group(['middleware'=>['auth:student','PreventBackHistory']], function(){
    Route::get('student/dashboard',[StudDashController::class,'index'])->name('student-home');
    Route::get('student/myclass', [StudCourseController::class,'index'])->name('student-myclass');
    Route::view('student/classfee','dashboard.user.classFee' )->name('student-classfee');
    Route::post('student/logout', [StudentController::class,'logout'])->name('student-logout');
    Route::get('student/course-materials',[StudMaterialController::class,'index'])->name('student-course-materials');
    Route::get('student/course-register/{id}',[StudDashController::class,'showreg'])->name('student-reg-course');
    Route::post('student/course-register/save',[StudDashController::class,'save'])->name('student-course-save');
    //student - download pdf
    Route::get('student/course-materials/download/{filename}',[StudMaterialController::class,'download'])->name('student-stud-download');
});


//password reset - student ----------------------
Route::get('student/forget-password',[ForgetPasswordController::class,'showForgetPasswordFrom'])->name('student-forget.form');
Route::post('student/forget-password',[ForgetPasswordController::class,'submitForgetPasswordForm'])->name('student-forget.email');
Route::get('student/reset-password/{token}',[ForgetPasswordController::class,'showResetPasswordForm'])->name('student-reset.form');
Route::post('student/reset-password',[ForgetPasswordController::class,'submitResetPasswordForm'])->name('student-reset.password');



//admin:guest---------------------------------------------------------------
Route::get('/admin/login',[AdminController::class,'showadminlogin'])->name('admin-login');
Route::post('/admin/check',[AdminController::class,'check'])->name('check');

//admin:auth
Route::group(['middleware'=>['auth:admin','PreventBackHistory']],function (){
    Route::get('admin/dashboard',[DashboardController::class,'index'])->name('admin-home');
    Route::post('admin/logout',[AdminController::class,'logout'])->name('admin-logout');
   
    //views- admin
    Route::view('admin/student','dashboard.admin.student')->name('admin-student');
    Route::view('admin/class','dashboard.admin.classes')->name('admin-class');
    Route::view('admin/links','dashboard.admin.managelinks')->name('admin-links');
    Route::view('admin/payments','dashboard.admin.payment')->name('admin-payment');
    Route::get('admin/announcement',[announcement::class,'index'])->name('admin-announcement');
    Route::get('admin/Todayregstudents',[DashboardController::class,'showtoday'])->name('admin-todayreg');
    Route::get('admin/Due-Payment',[DuepaymentController::class,'index'])->name('admin-duepayment');
    Route::get('admin/attendance',[AttendanceController::class,'index'])->name('admin-attendance');
    Route::get('admin/reports',[ReportController::class,'index'])->name('admin-reports');
    Route::view('admin/add-teachers','dashboard.admin.teacher-details')->name('admin-teacher-details');
    Route::get('admin/avb-course',[DashboardController::class,'showavbCourse'])->name('admin-avb-course');
    Route::get('admin/course-students/{id}',[DashboardController::class,'coursestud'])->name('admin-course-stud');
//course material
    Route::get('admin/course-material',[CourseMaterialsController::class,'index'])->name('materials');
    Route::post('admin/upload',[CourseMaterialsController::class,'uploadfile'])->name('file-upload');
    Route::get('admin/course-material/download/{filename}',[CourseMaterialsController::class,'downloadfile'])->name('file-download');
    Route::get('admin/course-material/delete/{id}',[CourseMaterialsController::class,'Removefilles'])->name('file-remove');

});

  

//teacher routes
Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::middleware(['guest:teacher','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::post('/check',[TeacherController::class,'check'])->name('check');
    
        });
        
    Route::middleware(['auth:teacher','PreventBackHistory'])->group(function(){
        Route::get('/dashboard',[TeacherController::class,'index'])->name('home');
        Route::get('/myclass',[MyClassController::class,'index'])->name('myclass');
        Route::get('/class-students/{id}',[MyClassController::class,'mystudents'])->name('classtud');
        Route::post('/logout',[TeacherController::class,'logout'])->name('logout');
        Route::get('/today-reg',[TeacherController::class,'todayReg'])->name('today-reg');
        Route::view('/class-link','dashboard.teacher.class-link')->name('class-link');
        
        //file materials
        Route::get('/course-material',[CoursePDFcontroller::class,'index'])->name('course-material');
        });
    });
        