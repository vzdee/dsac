<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $defaultTab = 'general-data';
        $errorGroups = [
            'general-data' => ['name', 'last_name', 'email', 'phone_number', 'password' ],
            'fiscal-data' => ['address', 'postal_code', 'rfc', 'curp', 'social_reason', 'fiscal_regime'],
        ];
        $errors = session('errors');
        if ($errors) {
            foreach ($errorGroups as $tabName => $fields) {
                if ($errors->hasAny($fields)) {
                    $defaultTab = $tabName;
                    break;
                }
            }

        }
        return view('admin.clients.create', compact('defaultTab', 'errorGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // merge data before validation
        $request->merge(['rfc' => strtoupper($request->rfc), 'curp' => strtoupper($request->curp),]);
        $data = $request->validate([
            // user data validation
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            'password' => 'required|string|min:8|confirmed',
            // client data validation
            'address' => 'required|string|max:255',
            'postal_code' => 'required|digits:5',
            'rfc' => ['required','string','max:13','regex:/^([A-ZÑ&]{3,4})(\d{6})([A-Z0-9]{3})$/','unique:clients,rfc',],
            'curp' => ['required','string','size:18','regex:/^[A-Z][AEIOUX][A-Z]{2}\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[A-Z0-9]\d$/', 'unique:clients,curp',],   
            'social_reason' => 'required|string|max:255',
            'fiscal_regime' => 'required|string|max:255',
        ]);
        // validate and create the user and client
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => $data['password'],
        ]);
        $user->assignRole('Cliente');
        // create client with user id 
        Client::create([
            'user_id' => $user->id,
            'address' => $data['address'],
            'postal_code' => $data['postal_code'],
            'rfc' => $data['rfc'],
            'curp' => $data['curp'],
            'social_reason' => $data['social_reason'],
            'fiscal_regime' => $data['fiscal_regime'],
        ]);
        // flash message before redirect
        return redirect()->route('admin.clients.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Cliente Creado',
                'text' => 'El cliente ha sido creado exitosamente',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        $defaultTab = 'general-data';
        return view('admin.clients.show', compact('client', 'defaultTab'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
        $defaultTab = 'general-data';
        // fields that can have errors
        $errorGroups = [
            'fiscal-data' => ['address', 'postal_code', 'rfc', 'curp', 'social_reason', 'fiscal_regime'],
        ];
        $errors = session('errors');
        if ($errors) {
            foreach ($errorGroups as $tabName => $fields) {
                if ($errors->hasAny($fields)) {
                    $defaultTab = $tabName;
                    break;
                }
            }
        }
        return view('admin.clients.edit', compact('client', 'defaultTab', 'errorGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $clientData = $request->validate([
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:5',
            'rfc' => 'required|string|max:13|unique:clients,rfc,' . $client->id,
            'curp' => 'required|string|max:18|unique:clients,curp,' . $client->id,
            'social_reason' => 'required|string|max:255',
            'fiscal_regime' => 'required|string|max:255',
        ]);
        $client->update($clientData);
        return redirect()->route('admin.clients.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Cliente Actualizado',
                'text' => 'La información del cliente ha sido actualizada exitosamente.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // * verify if client has appointments 
        $client->delete();
        return redirect()->route('admin.clients.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Cliente Eliminado',
                'text' => 'El cliente ha sido eliminado exitosamente.',
            ]);
    }
}
