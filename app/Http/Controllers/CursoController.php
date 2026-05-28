<?php

namespace App\Http\Controllers;

use App\Models\Curso;

class CursoController extends Controller{
    
    public function alumnos($id){
        $curso = Curso::find($id);

        if (!$curso){
            return response()->json([
                'mensaje' => 'Curso no encontrado'
            ], 404);
        }

        return response()->json($curso->alumnos);
    }
}