<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task; // Importa el modelo de tarea
use App\Models\User; // Importa el modelo de usuario
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    // Método para crear una nueva tarea
    public function create(Request $request)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Agrega aquí cualquier otra validación necesaria
        ]);

        // Crea una nueva instancia de Task y asigna los valores
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        // Asigna el estado inicial de la tarea
        $task->status = 'Pendiente';

        // Guarda la tarea asociada al usuario autenticado
        Auth::user()->tasks()->save($task);

        // Redirecciona o responde con un mensaje de éxito
    }

    // Método para eliminar una tarea existente
    public function delete($taskId)
    {
        // Busca la tarea por su ID
        $task = Task::findOrFail($taskId);

        // Verifica si el usuario autenticado puede eliminar la tarea
        $this->authorize('delete', $task);

        // Elimina la tarea
        $task->delete();

        // Redirecciona o responde con un mensaje de éxito
    }

    // Método para asignar un empleado a una tarea
    public function assignEmployee(Request $request, $taskId)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'employee_id' => 'required|exists:users,id',
        ]);

        // Busca la tarea por su ID
        $task = Task::findOrFail($taskId);

        // Verifica si el usuario autenticado puede asignar un empleado a la tarea
        $this->authorize('assignEmployee', $task);

        // Asigna el empleado a la tarea
        $task->assigned_to = $request->input('employee_id');
        // Guarda los cambios en la base de datos
        $task->save();

        // Redirecciona o responde con un mensaje de éxito
    }
}
