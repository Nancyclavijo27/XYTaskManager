<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task; // Importa el modelo de tarea
use App\Models\User; // Importa el modelo de usuario
use Illuminate\Support\Facades\Auth;
use App\Policies\TaskPolicy;


class TaskController extends Controller
{

    // Método para mostrar la lista de tareas
    public function index()
    {
        // Obtener todas las tareas desde la base de datos
        $tasks = Task::all();

        // Retornar la vista con las tareas
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
       // Obtener la lista de empleados disponibles para asignar tareas
    $employees = User::all();

    // Devolver la vista 'create' junto con la variable $employees
    return view('admin.tasks.create', compact('employees'));
    }


    // Método para crear una nueva tarea
    public function store(Request $request)
    {
         // Validar los datos recibidos del formulario
         $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'employee_id' => 'required|exists:users,id',
            // Agrega aquí cualquier otra validación necesaria
        ]);

        try {
            // Verificar si el usuario tiene permiso para crear tareas
            $this->authorize('create', Task::class);
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', 'No tienes permiso para crear tareas.');
        }

        // Crear una nueva instancia de Task y asignar los valores
        $task = new Task();
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        // Asignar el estado inicial de la tarea
        $task->status = 'Pendiente';
        $task->assigned_to = $validatedData['employee_id'];

        // Obtener el ID del usuario seleccionado en el formulario
        $employeeId = $validatedData['employee_id'];

        // Obtener el usuario correspondiente al ID seleccionado
        $assignedUser = User::findOrFail($employeeId);

        // Guardar la tarea asociada al usuario seleccionado
        $assignedUser->tasks()->save($task);
        // Redireccionar con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente');
    }


    
    

    // Método para eliminar una tarea existente
    public function delete($taskId)
    {
        // Busca la tarea por su ID
        $task = Task::findOrFail($taskId);

        try {
            $this->authorize('delete', $task);
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar esta tarea.');
        }

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

        try {
            $this->authorize('assignEmployee', $task);
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', 'No tienes permiso para asignar empleados a esta tarea.');
        }

        // Asigna el empleado a la tarea
        $task->assigned_to = $request->input('employee_id');
        // Guarda los cambios en la base de datos
        $task->save();

        // Redirecciona o responde con un mensaje de éxito
    }
}
