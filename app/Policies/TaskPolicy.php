<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Determine whether the user can view any tasks.
     */
    public function viewAny(User $user): bool
    {
        // Todos los usuarios pueden ver la lista de tareas
        return true;
    }

    /**
     * Determine whether the user can view the task.
     */
    public function view(User $user, Task $task): bool
    {
        // Todos los usuarios pueden ver una tarea específica
        return true;
    }

    /**
     * Determine whether the user can create tasks.
     */
    public function create(User $user): bool
    {
        // Solo los super admins pueden crear tareas
        return $user->role === 'super_admin';
    }

    /**
     * Determine whether the user can update the task.
     */
    public function update(User $user, Task $task): bool
    {
        // Solo los super admins pueden modificar tareas
        return $user->role === 'super_admin';
    }

    /**
     * Determine whether the user can delete the task.
     */
    public function delete(User $user, Task $task): bool
    {
        // Solo los super admins pueden eliminar tareas
        return $user->role === 'super_admin';
    }

    /**
     * Determine whether the user can restore the task.
     */
    public function restore(User $user, Task $task): bool
    {
        // Esta funcionalidad no se ha implementado, por lo que no se permite
        return false;
    }

    /**
     * Determine whether the user can permanently delete the task.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        // Esta funcionalidad no se ha implementado, por lo que no se permite
        return false;
    }
}
