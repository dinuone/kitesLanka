<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\StudentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\StudCourseController;
use App\Http\Controllers\Admin\announcement;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('student')->name('student.')->group(function(){

Route::middleware(['guest:student','PreventBackHistory'])->group(function(){
    Route::view('/login','dashboard.user.login')->name('login');
    Route::view('/register','dashboard.user.register')->name('register');
    Route::post('/create',[StudentController::class,'create'])->name('create');
    Route::post('/check',[StudentController::class,'check'])->name('check');
    

    });
    
Route::middleware(['auth:student','PreventBackHistory'])->group(function(){
    Route::view('/dashboard','dashboard.user.home')->name('home');
    Route::get('/myclass', [StudCourseController::class,'index'])->name('myclass');
    Route::view('/classfee','dashboard.user.classFee' )->name('classfee');
    Route::post('/logout', [StudentController::class,'logout'])->name('logout');
     
    });
});
    

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
    });
});
