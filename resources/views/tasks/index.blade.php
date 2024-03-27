<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Tareas</h1>

        <div class="row">
            <div class="col-md-8">
                <ul class="list-group">
                    @foreach ($tasks as $task)
                        @if ($task->assigned_to == Auth::id() || $task->user_id == Auth::id() || Auth::user()->role === 'super_admin')
                            <li class="list-group-item">
                                <h3>{{ $task->title }}</h3>
                                <p>{{ $task->description }}</p>
                                <p><strong>Estado:</strong> {{ $task->status }}</p>
                                <p><strong>Asignado a:</strong> {{ $task->assignedUser->name }}</p>
                                @if(Auth::user()->role === 'super_admin')
                                 <form action="{{ route('tasks.delete', ['taskId' => $task->id]) }}" method="POST">
                                   @csrf
                                     @method('DELETE')
                                    <button type="submit">Eliminar Tarea</button>
                                 </form>
                                @endif
                                <a href="{{ route('tasks.comments.show', $task) }}" class="btn btn-primary">Ver Comentarios</a>

                                <!-- Agrega aquí la lógica para mostrar los comentarios y archivos adjuntos -->
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
