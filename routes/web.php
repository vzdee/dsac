<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;

Route::get('/', function () {
    return view('home/index');
})->name('home');

Route::get('acerca-de', function(){
    return view('home/about-us');
})->name('about-us');

Route::get('servicios', function(){
    $services = Service::where('status', 'active')->get();
    return view('home/services', compact('services'));
})->name('services');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
