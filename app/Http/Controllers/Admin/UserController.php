<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get roles and pass to view (tallstackui method)
        $roles = Role::query()->select('id', 'name')->get()
            ->map(function ($role) {
                return [
                    'label' => $role->name,
                    'value' => $role->id,
                ];
            })->toArray();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate an create the user
        $userValidated = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create($userValidated);
        $role = Role::findOrFail($userValidated['role_id']); //find role id
        $user->assignRole($role); //assign role to user
        // flash message before redirect
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario Creado',
            'text' => 'El usuario ha sido creado exitosamente',
        ]);

        if ($user->hasRole('Cliente')) {
            $cliente = $user->client()->firstOrCreate();
            // route for clients created and being fill their fields
            return redirect()->route('admin.clients.edit', $cliente);
        }

        // redirect
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //get roles and pass to view (tallstackui method)
        $roles = Role::query()->select('id', 'name')->get()
            ->map(function ($role) {
                return [
                    'label' => $role->name,
                    'value' => $role->id,
                ];
            })->toArray();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $userValidated = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email,'.$user->id,
            'phone_number' => 'required|string|max:20|unique:users,phone_number,'.$user->id,
            'role_id' => 'required|exists:roles,id',
        ]);
        
        $user->update($userValidated);
        return redirect()->route('admin.users.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Usuario Actualizado',
                'text' => 'El usuario ha sido actualizado exitosamente',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //delete user
        if(Auth::id() === $user->id){
            abort(403, 'No puedes eliminar tu propio usuario.');
        }

        if($user->hasRole('Administrador') || $user->hasRole('Contador')){
            abort(403, 'No puedes eliminar un usuario con este rol.');
        }

        if($user->hasRole('Cliente') && $user->client){
            $user->client()->delete();
        }

        // validate if user has any active appointment
        // keep history of appointments for each user

        return redirect()->route('admin.users.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Usuario Eliminado',
                'text' => 'El usuario ha sido eliminado exitosamente',
            ]);
    }
}
