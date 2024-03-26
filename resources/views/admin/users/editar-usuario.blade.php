<!-- resources/views/editar-usuario.blade.php -->

@extends('layouts.app') <!-- Si tienes un layout principal, extiéndelo aquí -->

@section('content')
    <h1>Editar Usuario</h1>

    <!-- Formulario para cambiar el rol del usuario -->
    <form action="{{ route('usuarios.cambiar-rol', ['id' => $usuario->id]) }}" method="POST">
        @csrf
        @method('POST')

        <label for="nuevo_rol">Nuevo Rol:</label>
        <select name="nuevo_rol" id="nuevo_rol">
            <option value="admin">Admin</option>
            <option value="super_admin">Super Admin</option>
            <!-- Agrega aquí otras opciones de roles si es necesario -->
        </select>

        <button type="submit">Cambiar Rol</button>
    </form>
@endsection
