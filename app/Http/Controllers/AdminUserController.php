<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    // Método para mostrar el formulario de registro de usuario
    public function create()
    {
        return view('admin.users.create');
    }

    // Método para procesar el formulario de registro de usuario
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            // Agrega aquí cualquier otra validación necesaria
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            // Agrega aquí cualquier otro campo que necesites guardar
        ]);

        // Redireccionar al usuario a la lista de usuarios del superadmin con un mensaje de éxito
    return redirect()->route('superadmin.users')->with('success', 'Usuario creado exitosamente.');
    }
}
