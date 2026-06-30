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
    Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
        $upcomingAppointments = collect();
        $pendingAppointmentsCount = 0;
        
        $client = $request->user()->client;
        if ($client) {
            $query = $client->appointments()->where('scheduled_at', '>=', now());
            
            $pendingAppointmentsCount = (clone $query)->count();
            
            $upcomingAppointments = $query->with(['service', 'employee.user'])
                ->orderBy('scheduled_at', 'asc')
                ->take(3)
                ->get();
        }
        return view('dashboard', compact('upcomingAppointments', 'pendingAppointmentsCount'));
    })->name('dashboard');

    Route::get('/api/mis-citas', function (Illuminate\Http\Request $request) {
        return $request->user()->client?->appointments()->with('service')->get()->map(fn ($cita) => [
            'id' => $cita->id,
            'title' => $cita->service?->name ?? 'Cita Programada',
            'start' => $cita->scheduled_at->toIso8601String(),
            'backgroundColor' => $cita->status === 'pending' ? '#f59e0b' : '#3b82f6',
            'borderColor' => $cita->status === 'pending' ? '#f59e0b' : '#3b82f6',
        ]) ?? [];
    })->name('api.mis-citas');
});
