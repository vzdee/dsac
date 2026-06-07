<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //remove commas from price berfore validation
        $request->merge(['price' => str_replace(',', '', $request->input('price')),]);
        $service = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'required|string|max:150',
            'price' => 'required|integer|min:0',
            // status isn't required because default value is active
        ]);

        // create service
        Service::create([$service]);
        
        // return and flash message
        return redirect(route('admin.services.index'))
            ->with('success', 'Servicio creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //validate and update service
        $request->merge(['price' => str_replace(',', '', $request->input('price')),]);
        $serviceData = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'required|string|max:150',
            'price' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);
        $service->update($serviceData);

        // return and flash message
        return redirect(route('admin.services.index'))
            ->with('success','Servicio actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //delete service
        $service->delete();
        // return and flash message
        return view('admin.services.index');
    }
}
