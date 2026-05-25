<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    // Obtener todos
    public function index()
    {
        $alumnos = DB::table('alumno')->get();
        return response()->json($alumnos);
    }

    // Obtener por id
    public function show($id)
    {
        $alumno = DB::table('alumno')->where('id', $id)->first();
        return response()->json($alumno);
    }

    // Crear
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:32',
            'email' => 'required|email|unique:alumno',
            'password' => 'required|max:64'
        ]);

        DB::table('alumno')->insert([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'edad' => $request->edad,
            'password' => $request->password,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['mensaje' => 'Alumno creado']);
    }

    // Modificar
    public function update(Request $request, $id)
    {
        DB::table('alumno')->where('id', $id)->update([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'edad' => $request->edad,
            'password' => $request->password,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'updated_at' => now()
        ]);

        return response()->json(['mensaje' => 'Alumno actualizado']);
    }

    // Borrar
    public function destroy($id)
    {
        DB::table('alumno')->where('id', $id)->delete();
        return response()->json(['mensaje' => 'Alumno eliminado']);
    }
}