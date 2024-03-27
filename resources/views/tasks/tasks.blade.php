@foreach ($tasks as $task)
    <li class="list-group-item">
        <h3>{{ $task->title }}</h3>
        <p>{{ $task->description }}</p>
        <p><strong>Estado:</strong> {{ $task->status }}</p>
        <p><strong>Asignado a:</strong> {{ $task->assignedUser->name }}</p>
        <a href="{{ route('tasks.comments.show', $task) }}" class="btn btn-primary">Ver Comentarios</a>

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
