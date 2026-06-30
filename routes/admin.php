<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function(){
    $now = now();
    
    // Admin stats
    $totalAppointmentsMonth = \App\Models\Appointment::whereMonth('scheduled_at', $now->month)
        ->whereYear('scheduled_at', $now->year)
        ->count();
        
    $totalAppointmentsToday = \App\Models\Appointment::whereDate('scheduled_at', $now->toDateString())
        ->count();
        
    $revenueCompletedMonth = \App\Models\Appointment::whereMonth('scheduled_at', $now->month)
        ->whereYear('scheduled_at', $now->year)
        ->where('status', 'completed')
        ->sum('price');

    // Employee stats
    $myPendingAppointmentsToday = \App\Models\Appointment::where('employee_id', Auth::id())
        ->whereDate('scheduled_at', $now->toDateString())
        ->where('status', 'pending')
        ->count();
        
    $myTotalAppointmentsWeek = \App\Models\Appointment::where('employee_id', Auth::id())
        ->whereBetween('scheduled_at', [$now->startOfWeek(), $now->endOfWeek()])
        ->count();

    return view('admin.index', compact(
        'totalAppointmentsMonth', 
        'totalAppointmentsToday', 
        'revenueCompletedMonth',
        'myPendingAppointmentsToday',
        'myTotalAppointmentsWeek'
    ));
})->name('index');

// new routes
Route::resource('services', ServiceController::class);
Route::resource('users', UserController::class);
Route::resource('clients', ClientController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('appointments', AppointmentController::class);