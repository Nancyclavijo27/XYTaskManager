<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Informes</title>
</head>
<body>
    <h1>Generar Informes</h1>
    <form action="{{ route('reports.generate') }}" method="POST">
        @csrf
        <label for="start_date">Fecha de inicio:</label>
        <input type="date" id="start_date" name="start_date" required>
        <br>
        <label for="end_date">Fecha de fin:</label>
        <input type="date" id="end_date" name="end_date" required>
        <br>
        <button type="submit">Generar Informe</button>
    </form>
</body>
</html>
