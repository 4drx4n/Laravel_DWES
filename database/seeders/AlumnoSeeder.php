<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('alumno')->insert([
        [
            'nombre' => 'Adrian',
            'telefono' => '666234123',
            'edad' => 28,
            'password' => '123456',
            'email' => 'adrian@campico.com',
            'sexo' => 'Hombre',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nombre' => 'Daniel',
            'telefono' => '622456123',
            'edad' => 24,
            'password' => '123456',
            'email' => 'daniel@campico.com',
            'sexo' => 'Hombre',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nombre' => 'Isabel',
            'telefono' => null,
            'edad' => null,
            'password' => 'password',
            'email' => 'isabel@campico.com',
            'sexo' => 'Mujer',
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);
    }
}
