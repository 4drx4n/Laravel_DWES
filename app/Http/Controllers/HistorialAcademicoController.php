<?php

namespace App\Http\Controllers;

use App\Models\HistorialAcademico;

class HistorialAcademicoController extends Controller{
    
    public function alumno($id){
        $historial = HistorialAcademico::find($id);

        if (!$historial){
            return response()->json([
                'mensaje' => 'Historial académico no encontrado'
            ], 404);
        }

        return response()->json($historial->alumno);
    }
}