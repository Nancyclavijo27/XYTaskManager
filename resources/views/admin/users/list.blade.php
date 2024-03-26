<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol Actual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <!-- Enlace para editar usuario -->
                    <a href="{{ route('editar-usuario', ['id' => $user->id]) }}">Editar</a>

                    <!-- Formulario para cambiar rol -->
                    <form method="POST" action="{{ route('usuarios.cambiar-rol', ['id' => $user->id]) }}">
                        @csrf
                        @method('POST')
                        <select name="nuevo_rol">
                            <option value="super_admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="user">Usuario</option>
                        </select>
                        <button type="submit">Cambiar Rol</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
