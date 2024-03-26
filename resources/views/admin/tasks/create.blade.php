@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Tarea</h1>
    <form action="{{ route('admin.tasks.store') }}" method="POST"> <!-- Corregido para usar método POST y apuntar a 'store' -->
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="employee_id">Asignar a:</label>
            <select name="employee_id" id="employee_id" class="form-control">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Agrega aquí cualquier otro campo necesario para la tarea -->
        <button type="submit" class="btn btn-primary">Crear Tarea</button>
    </form>

    <a href="{{ route('superadmin.dashboard') }}">Volver al dashboard</a>
</div>
@endsection

