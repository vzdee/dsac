<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/index');
})->name('home');

Route::get('solicitar-servicio', function(){
    return view('home/request-service');
})->name('request-service');

Route::get('acerca-de', function(){
    return view('home/about-us');
})->name('about-us');

Route::get('servicios', function(){
    return view('home/services');
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
