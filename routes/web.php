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
use App\Http\Controllers\Auth\ForgetPasswordController;

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

Auth::routes();

//students routes
Route::prefix('student')->name('student.')->group(function(){

Route::middleware(['guest:student','PreventBackHistory'])->group(function(){
    Route::view('/login','dashboard.user.login')->name('login');
    Route::get('/register/{id}',[StudregController::class,'index'])->name('register');
    Route::post('/create',[StudentController::class,'create'])->name('create');
    Route::post('/check',[StudentController::class,'check'])->name('check');
    Route::get('/courses',[CourseController::class,'index'])->name('course');
    Route::get('/course/{id}',[CourseController::class,'selectcourse'])->name('select-course');
    Route::get('/teacher/{id}',[CourseController::class,'selectteacher'])->name('select-teacher');

    //password reset
    Route::get('/forget-password',[ForgetPasswordController::class,'showForgetPasswordFrom'])->name('forget.form');
    Route::post('/forget-password',[ForgetPasswordController::class,'submitForgetPasswordForm'])->name('forget.email');
    Route::get('/reset-password/{token}',[ForgetPasswordController::class,'showResetPasswordForm'])->name('reset.form');
    Route::post('/reset-password',[ForgetPasswordController::class,'submitResetPasswordForm'])->name('reset.password');
    

    });
    
Route::middleware(['auth:student','PreventBackHistory'])->group(function(){
    Route::get('/dashboard',[StudDashController::class,'index'])->name('home');
    Route::get('/myclass', [StudCourseController::class,'index'])->name('myclass');
    Route::view('/classfee','dashboard.user.classFee' )->name('classfee');
    Route::post('/logout', [StudentController::class,'logout'])->name('logout');
    Route::get('/course-materials',[StudMaterialController::class,'index'])->name('course-materials');
    Route::get('/course-materials/download/{file_name}',[StudMaterialController::class,'download'])->name('stud-download');
    Route::get('/course-register/{id}',[StudDashController::class,'showreg'])->name('reg-course');
    Route::post('/course-register/save',[StudDashController::class,'save'])->name('course-save');
     
    });
});
    
//admin routes
Route::prefix('@kt12admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/home',[DashboardController::class,'index'])->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::view('/student','dashboard.admin.student')->name('student');
        Route::view('/class','dashboard.admin.classes')->name('class');
        Route::view('/links','dashboard.admin.managelinks')->name('links');
        Route::view('/payments','dashboard.admin.payment')->name('payment');
        Route::get('/announcement',[announcement::class,'index'])->name('announcement');
        Route::get('/Todayregstudents',[DashboardController::class,'showtoday'])->name('todayreg');
        Route::get('/Due-Payment',[DuepaymentController::class,'index'])->name('duepayment');
        Route::get('/attendance',[AttendanceController::class,'index'])->name('attendace');
        Route::get('/course-material',[CourseMaterialsController::class,'index'])->name('materials');
        Route::post('/course-material/upload',[CourseMaterialsController::class,'store'])->name('file-upload');
        Route::get('/course-material/download/{file_name}',[CourseMaterialsController::class,'download'])->name('file-download');
        Route::get('/reports',[ReportController::class,'index'])->name('reports');
        Route::post('/reports/view,',[ReportController::class,'showchart'])->name('show-chart');
        Route::view('/add-teachers','dashboard.admin.teacher-details')->name('teacher-details');
    });
});


//teacher routes
Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::middleware(['guest:teacher','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::post('/check',[TeacherController::class,'check'])->name('check');
    
        });
        
    Route::middleware(['auth:teacher','PreventBackHistory'])->group(function(){
        Route::get('/dashboard',[TeacherController::class,'index'])->name('home');
         
        });
    });
        