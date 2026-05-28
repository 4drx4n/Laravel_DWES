<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';

    protected $fillable = [
        'nombre',
        'telefono',
        'edad',
        'password',
        'email',
        'sexo',
        'curso_id'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function historialAcademico()
    {
        return $this->hasOne(HistorialAcademico::class, 'alumno_id');
    }
}