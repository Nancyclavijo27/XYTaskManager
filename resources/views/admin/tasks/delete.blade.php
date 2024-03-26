@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Tareas</h1>
    <ul class="list-group">
        @foreach ($tasks as $task)
        <li class="list-group-item">
            <h3>{{ $task->title }}</h3>
            <p>{{ $task->description }}</p>
            <!-- Agrega cualquier otro detalle de la tarea que desees mostrar -->
            <form action="{{ route('tasks.delete', ['taskId' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
@endsection
