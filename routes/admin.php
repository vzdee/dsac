<?php

use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('admin.index');
})->name('index');

// new routes
Route::resource('services', ServiceController::class);