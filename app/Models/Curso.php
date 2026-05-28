<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';

    protected $fillable = [
        'nombre',
        'anio'
    ];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'curso_id');
    }
}