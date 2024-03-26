<!-- Formulario de registro de usuario -->
<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf

    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <!-- Agrega aquí cualquier otro campo que necesites -->

    <button type="submit">Registrar Usuario</button>
</form>
