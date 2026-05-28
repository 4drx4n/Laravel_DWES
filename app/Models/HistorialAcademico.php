<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialAcademico extends Model
{
    protected $table = 'historial_academico';

    protected $fillable = [
        'alumno_id',
        'nota_media',
        'asignaturas_aprobadas',
        'asignaturas_suspensas',
        'observaciones'
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}