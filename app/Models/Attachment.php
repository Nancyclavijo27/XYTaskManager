<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url',
    ];

    /**
     * Define la relación con la tarea asociada al archivo adjunto.
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Define la relación con el usuario que subió el archivo adjunto.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
