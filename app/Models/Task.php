<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    

    /**
     * Define las relaciones con otros modelos.
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Define métodos para manipular los datos de las tareas.
     */
    public function markAsCompleted()
    {
        $this->status = 'Completado';
        $this->save();
    }

    /**
     * Define las reglas de validación para las tareas.
     */
    public static function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Agrega aquí cualquier otra regla de validación necesaria
        ];
    }
}
