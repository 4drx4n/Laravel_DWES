<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('curso')->updateOrInsert(
            ['id' => 1],
            [
                'nombre' => '2º DAW',
                'anio' => 2025,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('curso')->updateOrInsert(
            ['id' => 2],
            [
                'nombre' => '1º DAW',
                'anio' => 2025,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('alumno')->where('id', 1)->update([
            'curso_id' => 1,
            'updated_at' => now()
        ]);

        DB::table('alumno')->where('id', 2)->update([
            'curso_id' => 1,
            'updated_at' => now()
        ]);

        DB::table('alumno')->where('id', 3)->update([
            'curso_id' => 2,
            'updated_at' => now()
        ]);

        DB::table('historial_academico')->updateOrInsert(
            ['alumno_id' => 1],
            [
                'nota_media' => 7.90,
                'asignaturas_aprobadas' => 9,
                'asignaturas_suspensas' => 1,
                'observaciones' => 'Alumno con buen rendimiento académico.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('historial_academico')->updateOrInsert(
            ['alumno_id' => 2],
            [
                'nota_media' => 8.80,
                'asignaturas_aprobadas' => 10,
                'asignaturas_suspensas' => 0,
                'observaciones' => 'Alumno con rendimiento alto.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('historial_academico')->updateOrInsert(
            ['alumno_id' => 3],
            [
                'nota_media' => 6.10,
                'asignaturas_aprobadas' => 7,
                'asignaturas_suspensas' => 3,
                'observaciones' => 'Alumno con margen de mejora.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}