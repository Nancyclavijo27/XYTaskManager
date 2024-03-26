<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    /**
     * Define la relación con la tarea asociada al comentario.
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Define la relación con el usuario que realizó el comentario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
