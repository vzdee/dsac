<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accountant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            'gender' => 'required|in:male,female',
            'birth_date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d') . '|after_or_equal:' . now()->subYears(90)->format('Y-m-d'),
            'password' => 'required|confirmed|min:8',
        ]);

        $accountant = User::create($user);
        $accountant->assignRole('Contador');
        Accountant::firstOrCreate(['user_id' => $accountant->id]);
        
        return redirect()->route('admin.employees.index')->with('swal', [
            'icon' => 'success',
            'title' => 'Empleado Creado',
            'text' => 'El empleado ha sido creado exitosamente.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Accountant $employee)
    {
        $defaultTab = 'general-data';
        return view('admin.employees.show', compact('employee', 'defaultTab'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accountant $employee)
    {
        //
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accountant $employee)
    {
        //
        $userValidated = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email,' . $employee->user_id,
            'phone_number' => 'required|string|max:20|unique:users,phone_number,' . $employee->user_id,
            'gender' => 'required|in:male,female',
            'birth_date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d') . '|after_or_equal:' . now()->subYears(90)->format('Y-m-d'),
        ]);
        if ($request->filled('password')){
            $request->validate(['password' => 'confirmed|min:8',]);
            $userValidated['password'] = $request->input('password');
        }

        $user = $employee->user;
        $user->update($userValidated);

        return redirect()->route('admin.employees.index')->with('swal', [
            'icon' => 'success',
            'title' => 'Empleado Actualizado',
            'text' => 'El empleado ha sido actualizado exitosamente.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accountant $employee)
    {
        if (Auth::id() === $employee->user_id) {
            return redirect()->route('admin.employees.index')->with('swal', [
                'icon' => 'error',
                'title' => 'No se puede eliminar el empleado',
                'text' => 'No puedes eliminar tu propio registro de empleado.',
            ]);
        }
        $employee->delete();
        $employee->user()->delete();
        return redirect()->route('admin.employees.index')->with('swal', [
            'icon' => 'success',
            'title' => 'Empleado Eliminado', 
            'text' => 'El empleado ha sido eliminado exitosamente.',
        ]);
    }
}
