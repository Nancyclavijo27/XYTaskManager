<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Método para mostrar el formulario de edición de usuario
    public function edit($id)
    {
        // Recuperar el usuario con el ID proporcionado
        $user = User::findOrFail($id);

        // Verificar si el usuario fue encontrado
        if (!$user) {
            // Si no se encuentra el usuario, redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // Pasar los datos del usuario a la vista
        return view('admin.users.editar-usuario', ['usuario' => $user]);
    }

    // Método para cambiar el rol del usuario
    public function cambiarRol(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nuevo_rol' => 'required|in:super_admin,admin,user', // Aquí puedes definir los roles válidos
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        $nuevoRol = $request->input('nuevo_rol');

        // Validar el nuevo rol si es necesario

        $usuario->role = $nuevoRol;
        $usuario->save();

        return redirect()->back()->with('success', 'Rol del usuario actualizado exitosamente.');
    }
}
