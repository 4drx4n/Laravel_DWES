<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HistorialAcademicoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\ValidarId;
use App\Http\Middleware\ComprobarToken;

// Route::get('/user', function (Request $request) {
//    return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/publica', function () {
    return response()->json([
        'mensaje' => 'Esta ruta es pública'
    ]);
});

Route::middleware([ComprobarToken::class])->group(function () {
    Route::get('/usuario', [AuthController::class, 'usuario']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/alumnos', [AlumnoController::class, 'index']);
    Route::post('/alumnos', [AlumnoController::class, 'store']);

    Route::middleware([ValidarId::class])->group(function () {
        Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
        Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
        Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);

        Route::get('/cursos/{id}/alumnos', [CursoController::class, 'alumnos']);
        Route::get('/alumnos/{id}/curso', [AlumnoController::class, 'curso']);
        Route::get('/alumnos/{id}/historial-academico', [AlumnoController::class, 'historialAcademico']);
        Route::get('/historial-academico/{id}/alumno', [HistorialAcademicoController::class, 'alumno']);
    });
});