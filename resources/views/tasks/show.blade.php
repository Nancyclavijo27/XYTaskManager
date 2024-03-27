<!-- resources/views/tasks/comments/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comentarios de la Tarea: {{ $task->title }}</h1>

        <!-- Formulario para crear un nuevo comentario -->
        <form action="{{ route('tasks.comments.store', $task) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Nuevo Comentario:</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Comentario</button>
        </form>

        <hr>

        <!-- Lista de comentarios existentes -->
        <h2>Comentarios Actuales:</h2>
        @foreach ($task->comments as $comment)
            <div>
                <p>{{ $comment->content }}</p>
                <form action="{{ route('comments.destroy', $comment) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar comentario</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
