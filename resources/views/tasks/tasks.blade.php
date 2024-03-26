<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Tareas</h1>

        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    @foreach ($tasks as $task)
                        <li class="list-group-item">
                            <h3>{{ $task->title }}</h3>
                            <p>{{ $task->description }}</p>
                            <p><strong>Estado:</strong> {{ $task->status }}</p>
                            <p><strong>Asignado a:</strong> {{ $task->assignedUser->name }}</p>

                            <h4>Comentarios:</h4>
                            <ul>
                                @foreach ($task->comments as $comment)
                                    <li>{{ $comment->content }}</li>
                                @endforeach
                            </ul>

                            <h4>Archivos Adjuntos:</h4>
                            <ul>
                                @foreach ($task->attachments as $attachment)
                                    <li><a href="{{ asset($attachment->url) }}">{{ $attachment->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
