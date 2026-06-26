<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('admin.index');
})->name('index');

// new routes
Route::resource('services', ServiceController::class);
Route::resource('users', UserController::class);
Route::resource('clients', ClientController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('appointments', AppointmentController::class);