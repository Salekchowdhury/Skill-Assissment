<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Employee;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [Admin\DashboarController::class, 'index']);

    // Admin Route

    Route::get('/employee', [Admin\AdminController::class, 'index'])->name('admin.employee.index');
    Route::get('/employee/create', [Admin\AdminController::class, 'create'])->name('admin.employee.create');
    Route::post('/employee/store', [Admin\AdminController::class, 'store'])->name('admin.employee.store');
    Route::get('/employee/{employee_id}/edit', [Admin\AdminController::class, 'edit']);
    Route::put('/employee/{employee_id}/update', [Admin\AdminController::class, 'update']);
    Route::get('/employee/{employee_id}/delete', [Admin\AdminController::class, 'delete']);

    // Employee Attendance Route
    Route::get('/employee/attendance_list', [Admin\AdminController::class, 'attendance_list']);


});

Route::prefix('employee')->middleware(['auth','isEmployee'])->group(function(){

    // Employee Route
    Route::get('/dashboard', [Employee\EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/attendance', [Employee\EmployeeController::class, 'index'])->name('employee.attendance.index');
    Route::get('/attendance/create', [Employee\EmployeeController::class, 'create'])->name('employee.attendance.create');
    Route::post('/attendance/store', [Employee\EmployeeController::class, 'store'])->name('employee.attendance.store');
});

 // PDF Route

 Route::get('/generate-pdf',[Admin\PdfController::class,'admin_generate_pdf']);
Route::get('/generate-pdf/{employee_id}/employee',[Admin\PdfController::class,'generate_pdf']);
Route::get('/download-pdf',[Admin\PdfController::class,'download_pdf']);
