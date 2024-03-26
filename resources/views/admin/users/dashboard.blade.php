<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Superadmin Dashboard</h1>
    
    <ul>
        
        <li><a href="{{ route('superadmin.users') }}">Lista de usuarios</a></li>
        <li><a href="{{ route('superadmin.reports') }}">Generar reportes</a></li>
        <!-- Agrega más enlaces según sea necesario -->
        <li><a href="{{ route('admin.tasks.create') }}">Crear tarea</a></li>
        <li><a href="{{ route('admin.users.create') }}">Crear usuario</a></li>
        <li><a href="{{ route('tasks.index') }}">Lista de Tareas</a></li>
    </ul>
   
</body>
</html>
