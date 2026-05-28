<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HistorialAcademicoController;
use App\Http\Middleware\ValidarId;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware([ValidarId::class])->group(function () {
    Route::get('/alumnos', [AlumnoController::class, 'index']);
    Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
    Route::post('/alumnos', [AlumnoController::class, 'store']);
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);
    Route::get('/cursos/{id}/alumnos', [CursoController::class, 'alumnos']);
    Route::get('/alumnos/{id}/curso', [AlumnoController::class, 'curso']);
    Route::get('/alumnos/{id}/historial-academico', [AlumnoController::class, 'historialAcademico']);
    Route::get('/historial-academico/{id}/alumno', [HistorialAcademicoController::class, 'alumno']);
});