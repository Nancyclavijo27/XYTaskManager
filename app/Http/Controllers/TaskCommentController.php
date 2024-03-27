<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class TaskCommentController extends Controller
{

    public function showComments(Task $task)
    {
        $tasks = Task::with('comments')->get();
        return view('tasks.show', compact('task'));
    } 

    public function store(Request $request, Task $task)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();


        $comment = new Comment();
        $comment->content = $request->input('content');

        // Asociar el comentario con el usuario y la tarea
        $comment->user_id = $user->id;
        $task->comments()->save($comment);


        return back()->with('success', 'Comentario agregado exitosamente');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Comentario eliminado exitosamente');
    }
}