<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'clase',
        'profesor',
        'salon',
        'edificio',
        'hora_inicio',
        'hora_fin',
        'dia',
        'user_id',
        'materia_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
